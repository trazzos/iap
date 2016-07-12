/**
Core script to handle the entire theme and core functions
**/
var Layout = function () {

    var layoutImgPath = 'layouts/layout/img/';

    var layoutCssPath = 'layouts/layout/css/';

    var resBreakpointMd = App.getResponsiveBreakpoint('md');

    var ajaxContentSuccessCallbacks = [];
    var ajaxContentErrorCallbacks = [];

    //* BEGIN:CORE HANDLERS *//
    // this function handles responsive layout on screen size resize or mobile device rotate.

    // Set proper height for sidebar and content. The content and sidebar height must be synced always.
    var handleSidebarAndContentHeight = function () {
        var content = jQuery('.page-content');
        var sidebar = jQuery('.page-sidebar');
        var body = jQuery('body');
        var height;

        if (body.hasClass("page-footer-fixed") === true && body.hasClass("page-sidebar-fixed") === false) {
            var available_height = App.getViewPort().height - jQuery('.page-footer').outerHeight() - jQuery('.page-header').outerHeight();
            var sidebar_height = sidebar.outerHeight();
            if (sidebar_height > available_height) {
                available_height = sidebar_height + jQuery('.page-footer').outerHeight();
            }
            if (content.height() < available_height) {
                content.attr('style', 'min-height:' + available_height + 'px');
            }
        } else {
            if (body.hasClass('page-sidebar-fixed')) {
                height = _calculateFixedSidebarViewportHeight();
                if (body.hasClass('page-footer-fixed') === false) {
                    height = height - jQuery('.page-footer').outerHeight();
                }
            } else {
                var headerHeight = jQuery('.page-header').outerHeight();
                var footerHeight = jQuery('.page-footer').outerHeight();

                if (App.getViewPort().width < resBreakpointMd) {
                    height = App.getViewPort().height - headerHeight - footerHeight;
                } else {
                    height = sidebar.height() + 20;
                }

                if ((height + headerHeight + footerHeight) <= App.getViewPort().height) {
                    height = App.getViewPort().height - headerHeight - footerHeight;
                }
            }
            content.attr('style', 'min-height:' + height + 'px');
        }
    };

    // Handle sidebar menu links
    var handleSidebarMenuActiveLink = function(mode, el) {
        var url = location.hash.toLowerCase();    

        var menu = jQuery('.page-sidebar-menu');

        if (mode === 'click' || mode === 'set') {
            el = jQuery(el);
        } else if (mode === 'match') {
            menu.find("li > a").each(function() {
                var path = jQuery(this).attr("href").toLowerCase();       
                // url match condition         
                if (path.length > 1 && url.substr(1, path.length - 1) == path.substr(1)) {
                    el = jQuery(this);
                    return; 
                }
            });
        }

        if (!el || el.size() == 0) {
            return;
        }

        if (el.attr('href').toLowerCase() === 'javascript:;' || el.attr('href').toLowerCase() === '#') {
            return;
        }        

        var slideSpeed = parseInt(menu.data("slide-speed"));
        var keepExpand = menu.data("keep-expanded");

        // begin: handle active state
        if (menu.hasClass('page-sidebar-menu-hover-submenu') === false) {
            menu.find('li.nav-item.open').each(function() {
                var match = false;
                jQuery(this).find('li').each(function(){
                    if (jQuery(this).find(' > a').attr('href') === el.attr('href')) {
                        match = true;
                        return;
                    }
                });

                if (match === true) {
                    return;
                }

                jQuery(this).removeClass('open');
                jQuery(this).find('> a > .arrow.open').removeClass('open');
                jQuery(this).find('> .sub-menu').slideUp();
            });  
        } else {
             menu.find('li.open').removeClass('open');
        }

        menu.find('li.active').removeClass('active');
        menu.find('li > a > .selected').remove();
        // end: handle active state

        el.parents('li').each(function () {
            jQuery(this).addClass('active');
            jQuery(this).find('> a > span.arrow').addClass('open');

            if (jQuery(this).parent('ul.page-sidebar-menu').size() === 1) {
                jQuery(this).find('> a').append('<span class="selected"></span>');
            }
            
            if (jQuery(this).children('ul.sub-menu').size() === 1) {
                jQuery(this).addClass('open');
            }
        });

        if (mode === 'click') {
            if (App.getViewPort().width < resBreakpointMd && jQuery('.page-sidebar').hasClass("in")) { // close the menu on mobile view while laoding a page 
                jQuery('.page-header .responsive-toggler').click();
            }
        }
    };

    // Handle sidebar menu
    var handleSidebarMenu = function () {
        // offcanvas mobile menu 
        jQuery('.page-sidebar-mobile-offcanvas .responsive-toggler').click(function() {
            jQuery('body').toggleClass('page-sidebar-mobile-offcanvas-open');
            e.preventDefault();
            e.stopPropagation();
        });

        if (jQuery('body').hasClass('page-sidebar-mobile-offcanvas')) {
            jQuery(document).on('click', function(e) {
                if (jQuery('body').hasClass('page-sidebar-mobile-offcanvas-open')) {
                    if (jQuery(e.target).closest('.page-sidebar-mobile-offcanvas .responsive-toggler').length === 0 && 
                        jQuery(e.target).closest('.page-sidebar-wrapper').length === 0) { 
                        jQuery('body').removeClass('page-sidebar-mobile-offcanvas-open');
                        e.preventDefault();
                        e.stopPropagation();
                    }
                }                
            });
        }

        // handle sidebar link click
        jQuery('.page-sidebar-menu').on('click', 'li > a.nav-toggle, li > a > span.nav-toggle', function (e) {
            var that = jQuery(this).closest('.nav-item').children('.nav-link');

            if (App.getViewPort().width >= resBreakpointMd && !jQuery('.page-sidebar-menu').attr("data-initialized") && jQuery('body').hasClass('page-sidebar-closed') &&  that.parent('li').parent('.page-sidebar-menu').size() === 1) {
                return;
            }

            var hasSubMenu = that.next().hasClass('sub-menu');

            if (App.getViewPort().width >= resBreakpointMd && that.parents('.page-sidebar-menu-hover-submenu').size() === 1) { // exit of hover sidebar menu
                return;
            }

            if (hasSubMenu === false) {
                if (App.getViewPort().width < resBreakpointMd && jQuery('.page-sidebar').hasClass("in")) { // close the menu on mobile view while laoding a page 
                    jQuery('.page-header .responsive-toggler').click();
                }
                return;
            }

            var parent =that.parent().parent();
            var the = that;
            var menu = jQuery('.page-sidebar-menu');
            var sub = that.next();

            var autoScroll = menu.data("auto-scroll");
            var slideSpeed = parseInt(menu.data("slide-speed"));
            var keepExpand = menu.data("keep-expanded");
            
            if (!keepExpand) {
                parent.children('li.open').children('a').children('.arrow').removeClass('open');
                parent.children('li.open').children('.sub-menu:not(.always-open)').slideUp(slideSpeed);
                parent.children('li.open').removeClass('open');
            }

            var slideOffeset = -200;

            if (sub.is(":visible")) {
                jQuery('.arrow', the).removeClass("open");
                the.parent().removeClass("open");
                sub.slideUp(slideSpeed, function () {
                    if (autoScroll === true && jQuery('body').hasClass('page-sidebar-closed') === false) {
                        if (jQuery('body').hasClass('page-sidebar-fixed')) {
                            menu.slimScroll({
                                'scrollTo': (the.position()).top
                            });
                        } else {
                            App.scrollTo(the, slideOffeset);
                        }
                    }
                    handleSidebarAndContentHeight();
                });
            } else if (hasSubMenu) {
                jQuery('.arrow', the).addClass("open");
                the.parent().addClass("open");
                sub.slideDown(slideSpeed, function () {
                    if (autoScroll === true && jQuery('body').hasClass('page-sidebar-closed') === false) {
                        if (jQuery('body').hasClass('page-sidebar-fixed')) {
                            menu.slimScroll({
                                'scrollTo': (the.position()).top
                            });
                        } else {
                            App.scrollTo(the, slideOffeset);
                        }
                    }
                    handleSidebarAndContentHeight();
                });
            }

            e.preventDefault();
        });

        // handle menu close for angularjs version
        if (App.isAngularJsApp()) {
            jQuery(".page-sidebar-menu li > a").on("click", function(e) {
                if (App.getViewPort().width < resBreakpointMd && jQuery(this).next().hasClass('sub-menu') === false) {
                    jQuery('.page-header .responsive-toggler').click();
                }
            });
        }

        // handle ajax links within sidebar menu
        jQuery('.page-sidebar').on('click', ' li > a.ajaxify', function (e) {
            e.preventDefault();
            App.scrollTop();
            var url = jQuery(this).attr("href");
            var menuContainer = jQuery('.page-sidebar ul');

            menuContainer.children('li.active').removeClass('active');
            menuContainer.children('arrow.open').removeClass('open');

            jQuery(this).parents('li').each(function () {
                jQuery(this).addClass('active');
                jQuery(this).children('a > span.arrow').addClass('open');
            });
            jQuery(this).parents('li').addClass('active');

            if (App.getViewPort().width < resBreakpointMd && jQuery('.page-sidebar').hasClass("in")) { // close the menu on mobile view while laoding a page 
                jQuery('.page-header .responsive-toggler').click();
            }

            Layout.loadAjaxContent(url, jQuery(this));
        });

        // handle ajax link within main content
        jQuery('.page-content').on('click', '.ajaxify', function (e) {
            e.preventDefault();
            App.scrollTop();

            var url = jQuery(this).attr("href");

            if (App.getViewPort().width < resBreakpointMd && jQuery('.page-sidebar').hasClass("in")) { // close the menu on mobile view while laoding a page 
                jQuery('.page-header .responsive-toggler').click();
            }

            Layout.loadAjaxContent(url);
        });

        // handle scrolling to top on responsive menu toggler click when header is fixed for mobile view
        jQuery(document).on('click', '.page-header-fixed-mobile .page-header .responsive-toggler', function(){
            App.scrollTop(); 
        });      
     
        // handle sidebar hover effect        
        handleFixedSidebarHoverEffect();

        // handle the search bar close
        jQuery('.page-sidebar').on('click', '.sidebar-search .remove', function (e) {
            e.preventDefault();
            jQuery('.sidebar-search').removeClass("open");
        });

        // handle the search query submit on enter press
        jQuery('.page-sidebar .sidebar-search').on('keypress', 'input.form-control', function (e) {
            if (e.which == 13) {
                jQuery('.sidebar-search').submit();
                return false; //<---- Add this line
            }
        });

        // handle the search submit(for sidebar search and responsive mode of the header search)
        jQuery('.sidebar-search .submit').on('click', function (e) {
            e.preventDefault();
            if (jQuery('body').hasClass("page-sidebar-closed")) {
                if (jQuery('.sidebar-search').hasClass('open') === false) {
                    if (jQuery('.page-sidebar-fixed').size() === 1) {
                        jQuery('.page-sidebar .sidebar-toggler').click(); //trigger sidebar toggle button
                    }
                    jQuery('.sidebar-search').addClass("open");
                } else {
                    jQuery('.sidebar-search').submit();
                }
            } else {
                jQuery('.sidebar-search').submit();
            }
        });

        // handle close on body click
        if (jQuery('.sidebar-search').size() !== 0) {
            jQuery('.sidebar-search .input-group').on('click', function(e){
                e.stopPropagation();
            });

            jQuery('body').on('click', function() {
                if (jQuery('.sidebar-search').hasClass('open')) {
                    jQuery('.sidebar-search').removeClass("open");
                }
            });
        }
    };

    // Helper function to calculate sidebar height for fixed sidebar layout.
    var _calculateFixedSidebarViewportHeight = function () {
        var sidebarHeight = App.getViewPort().height - jQuery('.page-header').outerHeight(true);
        if (jQuery('body').hasClass("page-footer-fixed")) {
            sidebarHeight = sidebarHeight - jQuery('.page-footer').outerHeight();
        }

        return sidebarHeight;
    };

    // Handles fixed sidebar
    var handleFixedSidebar = function () {
        var menu = jQuery('.page-sidebar-menu');

        handleSidebarAndContentHeight();

        if (jQuery('.page-sidebar-fixed').size() === 0) {
            return;
        }

        if (App.getViewPort().width >= resBreakpointMd && !jQuery('body').hasClass('page-sidebar-menu-not-fixed')) {
             menu.attr("data-height", _calculateFixedSidebarViewportHeight());
            App.destroySlimScroll(menu);
            App.initSlimScroll(menu);
            handleSidebarAndContentHeight();
        }
    };

    // Handles sidebar toggler to close/hide the sidebar.
    var handleFixedSidebarHoverEffect = function () {
        var body = jQuery('body');
        if (body.hasClass('page-sidebar-fixed')) {
            jQuery('.page-sidebar').on('mouseenter', function () {
                if (body.hasClass('page-sidebar-closed')) {
                    jQuery(this).find('.page-sidebar-menu').removeClass('page-sidebar-menu-closed');
                }
            }).on('mouseleave', function () {
                if (body.hasClass('page-sidebar-closed')) {
                    jQuery(this).find('.page-sidebar-menu').addClass('page-sidebar-menu-closed');
                }
            });
        }
    };

    // Hanles sidebar toggler
    var handleSidebarToggler = function () {
        var body = jQuery('body');
        if (jQuery.cookie && jQuery.cookie('sidebar_closed') === '1' && App.getViewPort().width >= resBreakpointMd) {
            jQuery('body').addClass('page-sidebar-closed');
            jQuery('.page-sidebar-menu').addClass('page-sidebar-menu-closed');
        }

        // handle sidebar show/hide
        jQuery('body').on('click', '.sidebar-toggler', function (e) {
            var sidebar = jQuery('.page-sidebar');
            var sidebarMenu = jQuery('.page-sidebar-menu');
            jQuery(".sidebar-search", sidebar).removeClass("open");

            if (body.hasClass("page-sidebar-closed")) {
                body.removeClass("page-sidebar-closed");
                sidebarMenu.removeClass("page-sidebar-menu-closed");
                if (jQuery.cookie) {
                    jQuery.cookie('sidebar_closed', '0');
                }
            } else {
                body.addClass("page-sidebar-closed");
                sidebarMenu.addClass("page-sidebar-menu-closed");
                if (body.hasClass("page-sidebar-fixed")) {
                    sidebarMenu.trigger("mouseleave");
                }
                if (jQuery.cookie) {
                    jQuery.cookie('sidebar_closed', '1');
                }
            }

            jQuery(window).trigger('resize');
        });
    };

    // Handles the horizontal menu
    var handleHorizontalMenu = function () {
        //handle tab click
        jQuery('.page-header').on('click', '.hor-menu a[data-toggle="tab"]', function (e) {
            e.preventDefault();
            var nav = jQuery(".hor-menu .nav");
            var active_link = nav.find('li.current');
            jQuery('li.active', active_link).removeClass("active");
            jQuery('.selected', active_link).remove();
            var new_link = jQuery(this).parents('li').last();
            new_link.addClass("current");
            new_link.find("a:first").append('<span class="selected"></span>');
        });

        // handle search box expand/collapse        
        jQuery('.page-header').on('click', '.search-form', function (e) {
            jQuery(this).addClass("open");
            jQuery(this).find('.form-control').focus();

            jQuery('.page-header .search-form .form-control').on('blur', function (e) {
                jQuery(this).closest('.search-form').removeClass("open");
                jQuery(this).unbind("blur");
            });
        });

        // handle hor menu search form on enter press
        jQuery('.page-header').on('keypress', '.hor-menu .search-form .form-control', function (e) {
            if (e.which == 13) {
                jQuery(this).closest('.search-form').submit();
                return false;
            }
        });

        // handle header search button click
        jQuery('.page-header').on('mousedown', '.search-form.open .submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            jQuery(this).closest('.search-form').submit();
        });

        
        jQuery(document).on('click', '.mega-menu-dropdown .dropdown-menu', function (e) {
            e.stopPropagation();
        });
    };

    // Handles Bootstrap Tabs.
    var handleTabs = function () {
        // fix content height on tab click
        jQuery('body').on('shown.bs.tab', 'a[data-toggle="tab"]', function () {
            handleSidebarAndContentHeight();
        });
    };

    // Handles the go to top button at the footer
    var handleGoTop = function () {
        var offset = 300;
        var duration = 500;

        if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) {  // ios supported
            jQuery(window).bind("touchend touchcancel touchleave", function(e){
               if (jQuery(this).scrollTop() > offset) {
                    jQuery('.scroll-to-top').fadeIn(duration);
                } else {
                    jQuery('.scroll-to-top').fadeOut(duration);
                }
            });
        } else {  // general 
            jQuery(window).scroll(function() {
                if (jQuery(this).scrollTop() > offset) {
                    jQuery('.scroll-to-top').fadeIn(duration);
                } else {
                    jQuery('.scroll-to-top').fadeOut(duration);
                }
            });
        }
        
        jQuery('.scroll-to-top').click(function(e) {
            e.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, duration);
            return false;
        });
    };

    // Hanlde 100% height elements(block, portlet, etc)
    var handle100HeightContent = function () {

        jQuery('.full-height-content').each(function(){
            var target = jQuery(this);
            var height;

            height = App.getViewPort().height -
                jQuery('.page-header').outerHeight(true) -
                jQuery('.page-footer').outerHeight(true) -
                jQuery('.page-title').outerHeight(true) -
                jQuery('.page-bar').outerHeight(true);

            if (target.hasClass('portlet')) {
                var portletBody = target.find('.portlet-body');

                App.destroySlimScroll(portletBody.find('.full-height-content-body')); // destroy slimscroll 
                
                height = height -
                    target.find('.portlet-title').outerHeight(true) -
                    parseInt(target.find('.portlet-body').css('padding-top')) -
                    parseInt(target.find('.portlet-body').css('padding-bottom')) - 5;

                if (App.getViewPort().width >= resBreakpointMd && target.hasClass("full-height-content-scrollable")) {
                    height = height - 35;
                    portletBody.find('.full-height-content-body').css('height', height);
                    App.initSlimScroll(portletBody.find('.full-height-content-body'));
                } else {
                    portletBody.css('min-height', height);
                }
            } else {
               App.destroySlimScroll(target.find('.full-height-content-body')); // destroy slimscroll 

                if (App.getViewPort().width >= resBreakpointMd && target.hasClass("full-height-content-scrollable")) {
                    height = height - 35;
                    target.find('.full-height-content-body').css('height', height);
                    App.initSlimScroll(target.find('.full-height-content-body'));
                } else {
                    target.css('min-height', height);
                }
            }
        });        
    };
    //* END:CORE HANDLERS *//

    return {
        // Main init methods to initialize the layout
        //IMPORTANT!!!: Do not modify the core handlers call order.

        initHeader: function() {
            handleHorizontalMenu(); // handles horizontal menu    
        },

        setSidebarMenuActiveLink: function(mode, el) {
            handleSidebarMenuActiveLink(mode, el);
        },

        initSidebar: function() {
            //layout handlers
            handleFixedSidebar(); // handles fixed sidebar menu
            handleSidebarMenu(); // handles main menu
            handleSidebarToggler(); // handles sidebar hide/show

            if (App.isAngularJsApp()) {      
                handleSidebarMenuActiveLink('match'); // init sidebar active links 
            }

            App.addResizeHandler(handleFixedSidebar); // reinitialize fixed sidebar on window resize
        },

        initContent: function() {
            handle100HeightContent(); // handles 100% height elements(block, portlet, etc)
            handleTabs(); // handle bootstrah tabs

            App.addResizeHandler(handleSidebarAndContentHeight); // recalculate sidebar & content height on window resize
            App.addResizeHandler(handle100HeightContent); // reinitialize content height on window resize 
        },

        initFooter: function() {
            handleGoTop(); //handles scroll to top functionality in the footer
        },

        init: function () {            
            this.initHeader();
            this.initSidebar();
            this.initContent();
            this.initFooter();
        },

        loadAjaxContent: function(url, sidebarMenuLink) {
            var pageContent = jQuery('.page-content .page-content-body');    

            App.startPageLoading({animate: true});
            
            $.ajax({
                type: "GET",
                cache: false,
                url: url,
                dataType: "html",
                success: function (res) {    
                    App.stopPageLoading();
                                    
                    for (var i = 0; i < ajaxContentSuccessCallbacks.length; i++) {
                        ajaxContentSuccessCallbacks[i].call(res);
                    }

                    if (sidebarMenuLink.size() > 0 && sidebarMenuLink.parents('li.open').size() === 0) {
                        jQuery('.page-sidebar-menu > li.open > a').click();
                    }

                    pageContent.html(res);
                    Layout.fixContentHeight(); // fix content height
                    App.initAjax(); // initialize core stuff
                },
                error: function (res, ajaxOptions, thrownError) {
                    App.stopPageLoading();
                    pageContent.html('<h4>Could not load the requested content.</h4>');

                    for (var i = 0; i < ajaxContentErrorCallbacks.length; i++) {
                        ajaxContentSuccessCallbacks[i].call(res);
                    }                    
                }
            });
        },

        addAjaxContentSuccessCallback: function(callback) {
            ajaxContentSuccessCallbacks.push(callback);
        },

        addAjaxContentErrorCallback: function(callback) {
            ajaxContentErrorCallbacks.push(callback);
        },

        //public function to fix the sidebar and content height accordingly
        fixContentHeight: function () {
            handleSidebarAndContentHeight();
        },

        initFixedSidebarHoverEffect: function() {
            handleFixedSidebarHoverEffect();
        },

        initFixedSidebar: function() {
            handleFixedSidebar();
        },

        getLayoutImgPath: function () {
            return App.getAssetsPath() + layoutImgPath;
        },

        getLayoutCssPath: function () {
            return App.getAssetsPath() + layoutCssPath;
        }
    };

}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {    
       Layout.init(); // init metronic core componets
    });
}