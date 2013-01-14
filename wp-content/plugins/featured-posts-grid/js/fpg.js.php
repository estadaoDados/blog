<?php 
    header('content-type: application/x-javascript'); 
    define('WP_USE_THEMES', false);
    require_once((dirname(dirname(dirname(dirname(dirname( __FILE__ ) ) )))).'/wp-config.php');
?>

<?php
    $fpg_page_speed = get_option('fpg_page_speed');
    $post_autoscroll = get_option('fpg_autoscroll');
    $post_scroll_interval = get_option('fpg_scroll_interval');
    $fpg_rollover = get_option('fpg_rollover');
?>

var FeaturedPostsLib = this.FeaturedPostsLib || {};
FeaturedPostsLib.fpg = FeaturedPostsLib.fpg || {};

(function($j) {
    var animationLocked = new Array(); // Lock object for animations
    var autoscrollInterval = new Array();

    /** Initialize jQuery based animations */
    FeaturedPostsLib.fpg.init = function()
    {
        // hide all pages on first entry in featured posts list
        $j('.fpg-wrapper').each(function() {
           $j(this).children('.fpg-page').slice(1).find('.fpg-item').css(
               {'margin-top':'3px','opacity':0.0});
        });

        // initialize the scroll buttons and autoscroll
        initAutoscroll();
        initScrollButtons();
        initPips();

        // release animation locks
        for (var i=1; i<=animationLocked.length; i++)
        {
            animationLocked[i-1] = false;
        }
    };


    /** Add click event handlers to scroll buttons */
    function initScrollButtons()
    {
        $j('.fpg-arrow-right').each(function(index) {
            $j(this).click(function() {
                if (animationLocked[index] == false)
                {
                    FeaturedPostsLib.fpg.fpgScrollPages(this, 'right', index);
                }
                clearInterval(autoscrollInterval[index]);
            });
        });

        $j('.fpg-arrow-left').each(function(index) {
            $j(this).click(function() {
                if (animationLocked[index] == false)
                {
                    FeaturedPostsLib.fpg.fpgScrollPages(this, 'left', index);
                }
                clearInterval(autoscrollInterval[index]);
            });
        });
    }


    function initPips()
    {
        $j('.fpg-arrow-wrapper').each(function(index) {
            $j(this).children('.fpg-arrow-pip').click(function() {
                if (animationLocked[index] == false)
                {
                    fpgScrollToPage(this, index);
                }
                clearInterval(autoscrollInterval[index]);
            });
        });
    }


    function initAutoscroll()
    {
        
        $j('.fpg-wrapper').each(function(index) {
            animationLocked[index] = true;

            if (1 == <?php echo $post_autoscroll ?>)
            {
                var callback = 
                    "FeaturedPostsLib.fpg.fpgScrollPages(jQuery('.fpg-wrapper').slice(" + 
                    index + "," + (index + 1) + ").find('.fpg-arrow-right'), 'right', " + index + ")";
                autoscrollInterval[index] = setInterval(
                    callback, <?php echo $post_scroll_interval ?>);
            }
        });
    
    }


    function fpgScrollToPage(slideButton, index)
    {
        if (!($j(slideButton).hasClass('fpg-selected-pip')))
        {
            // lock animations
            animationLocked[index] = true;

            // get the currently displayed element(s)
            var currentItem = $j(slideButton).parent().siblings('.fpg-page:visible');

            // get the next item to display
            var nextItemIndex = parseInt($j(slideButton).text());
            
            var nextItem = $j(slideButton).parent().siblings('.fpg-page').eq(nextItemIndex-1);

            fpgSetSelectedPip(nextItem);
            fpgAnimate(nextItem, currentItem, 'right', index);
        }
    }


    FeaturedPostsLib.fpg.fpgScrollPages = function(button, dir, index)
    {
        if (animationLocked[index] != true)
        {
            // lock animations
            animationLocked[index] = true;

            // get the currently displayed element(s)
            var currentItem = $j(button).parent().siblings('.fpg-page:visible');

            var nextItem;
         
            if (dir == 'right')
            {
                nextItem = currentItem.next('.fpg-page');
            }
            else if (dir == 'left')
            {
                nextItem = currentItem.prev('.fpg-page');
            }

            if (nextItem.length > 0)
            {
                fpgSetSelectedPip(nextItem);
                fpgAnimate(nextItem, currentItem, dir, index);
            }
            else if (1 == <?php echo $fpg_rollover ?>)
            {
                if (dir == 'right')
                {
                    nextItem = currentItem.siblings('.fpg-page').first();
                }
                else if (dir == 'left')
                {
                    nextItem = currentItem.siblings('.fpg-page').last();
                }

                fpgSetSelectedPip(nextItem);
                fpgAnimate(nextItem, currentItem, dir, index);
            }
            else
            {
                animationLocked[index] = false;
            }
        }
    };


    function fpgSetSelectedPip(toShow)
    {
        // Remove class from current slide
        $j(toShow).siblings('.fpg-arrow-wrapper').children('.fpg-selected-pip').removeClass('fpg-selected-pip');

        // Get the index of the next item to be displayed
        var nextSlideIndex = $j(toShow).index();

        $j(toShow).siblings('.fpg-arrow-wrapper').children('.fpg-arrow-pip').eq(nextSlideIndex).addClass('fpg-selected-pip');
    }


    function fpgAnimate(toShow, toHide, dir, index)
    {
        // fade out items on currently shown page
        var itemToHide;
        if (dir == 'right')
        {
            itemToHide = $j(toHide).children().children('.fpg-item.fpg-first-col');
        }
        else
        {
            itemToHide = $j(toHide).children().children('.fpg-item').last();
        }
        

        fpgFadeOutItems(itemToHide, dir, function() {
            toHide.css('display','none');
            toShow.css('display','');

            var itemToShow;
            if (dir == 'right')
            {
                itemToShow = $j(toShow).children().children('.fpg-item.fpg-first-col');
            }
            else
            {
                itemToShow = $j(toShow).children().children('.fpg-item').last();
            }

            fpgFadeInItems(itemToShow, dir, function() {
                animationLocked[index] = false;
            });
        });
    }


    function fpgFadeOutItems(itemToHide, dir, callback)
    {
        var itemCount = itemToHide.length;
        $j(itemToHide).animate({ 'opacity': 0.0, 
                                 'margin-top': '3' }, 
            <?php echo $fpg_page_speed; ?>, 'linear', function() {
                if (--itemCount <= 0)
                {
                    var nextItem;
                    if (dir == 'right')
                    {
                        nextItem = $j(itemToHide).next('.fpg-item');
                    }
                    else
                    {
                        nextItem = $j(itemToHide).prev('.fpg-item');
                    }

                    if (nextItem.length > 0) 
                        fpgFadeOutItems(nextItem, dir, callback);
                    else
                        callback();
                }
            }
        );
    }


    function fpgFadeInItems(itemToShow, dir, callback)
    {
        var itemCount = itemToShow.length;
        $j(itemToShow).animate({ 'opacity': 1.0, 
                                 'margin-top': '0' }, 
            <?php echo $fpg_page_speed; ?>, 'linear', function() {
                if (--itemCount <= 0)
                {
                    var nextItem;
                    if (dir == 'right')
                    {
                        nextItem = $j(itemToShow).next('.fpg-item');
                    }
                    else
                    {
                        nextItem = $j(itemToShow).prev('.fpg-item');
                    }

                    if (nextItem.length >0 ) 
                        fpgFadeInItems(nextItem, dir, callback);
                    else
                        callback();
                }
            }
        );
    }
    
}(jQuery))

jQuery(document).ready(FeaturedPostsLib.fpg.init);