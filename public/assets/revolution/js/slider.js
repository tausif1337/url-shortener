/*------------------------------------------------------------------------------*/
/*  Home_Page Slider
/*------------------------------------------------------------------------------*/
var revapi51,
tpj=jQuery;


/* (homepage -1 )*/

tpj(document).ready(function() {
  if(tpj("#rev_slider_5_1").revolution == undefined){
      revslider_showDoubleJqueryError("#rev_slider_5_1");
    }else{
      revapi41 = tpj("#rev_slider_5_1").show().revolution({
        sliderType:"standard",
        sliderLayout: "fullwidth",
        dottedOverlay:"none",
        delay:6000,
        navigation: {
          keyboardNavigation:"off",
          keyboard_direction: "horizontal",
          mouseScrollNavigation:"off",
          mouseScrollReverse:"default",
          onHoverStop:"off",
          touch:{
            touchenabled:"on",
            swipe_threshold: 75,
            swipe_min_touches: 1,
            swipe_direction: "horizontal",
            drag_block_vertical: false
          }
          ,
          arrows: {
            style:"zeus",
            enable:true,
            hide_under:991,
            hide_onleave:true,
            tmp:'',
            left: {
              h_align:"left",
              v_align:"center",
              h_offset:20,
              v_offset:0
            },
            right: {
              h_align:"right",
              v_align:"center",
              h_offset:20,
              v_offset:0
            }
          }
        },
         viewPort: {
            enable:true,
            outof:"pause",
            visible_area:"100%",
            presize:false
        },
        responsiveLevels:[1240,1024,778,480],
        visibilityLevels:[1240,1024,778,480],
        gridwidth:[1240,1024,778,480],
        gridheight:[640,640,480,320],
        lazyType:"none",
        parallax: {
            type:"mouse",
            origo:"slidercenter",
            speed:2000,
            levels:[2,3,4,5,6,7,12,16,10,50,46,47,48,49,50,55],
            type:"mouse",
        },
        shadow:0,
        spinner:"spinner0",
        stopLoop:"off",
        stopAfterLoops:-1,
        stopAtSlide:-1,
        shuffle:"off",
        autoHeight:"off",
        disableProgressBar:"on",
        hideThumbsOnMobile:"off",
        hideSliderAtLimit:0,
        hideCaptionAtLimit:0,
        hideAllCaptionAtLilmit:0,
        debugMode:false,
        fallbacks: {
            simplifyAll:"off",
            nextSlideOnWindowFocus:"off",
            disableFocusListener:false,
        }
      });
    }
  });
 

/* (homepage -2 )*/
tpj(document).ready(function() {
  if(tpj("#rev_slider_5_2").revolution == undefined){
      revslider_showDoubleJqueryError("#rev_slider_5_2");
    }else{
      revapi41 = tpj("#rev_slider_5_2").show().revolution({
        sliderType:"standard",
        sliderLayout: "fullwidth",
        dottedOverlay:"none",
        delay:6000,
        navigation: {
          keyboardNavigation:"off",
          keyboard_direction: "horizontal",
          mouseScrollNavigation:"off",
          mouseScrollReverse:"default",
          onHoverStop:"off",
          touch:{
            touchenabled:"on",
            swipe_threshold: 75,
            swipe_min_touches: 1,
            swipe_direction: "horizontal",
            drag_block_vertical: false
          }
          ,
          arrows: {
            style:"zeus",
            enable:true,
            hide_under:991,
            hide_onleave:true,
            tmp:'',
            left: {
              h_align:"left",
              v_align:"center",
              h_offset:20,
              v_offset:0
            },
            right: {
              h_align:"right",
              v_align:"center",
              h_offset:20,
              v_offset:0
            }
          }
        },
         viewPort: {
            enable:true,
            outof:"pause",
            visible_area:"100%",
            presize:false
        },
        responsiveLevels:[1240,1024,778,480],
        visibilityLevels:[1240,1024,778,480],
        gridwidth:[1240,1024,778,480],
        gridheight:[770,670,480,320],
        lazyType:"none",
        parallax: {
            type:"mouse",
            origo:"slidercenter",
            speed:2000,
            levels:[2,3,4,5,6,7,12,16,10,50,46,47,48,49,50,55],
            type:"mouse",
        },
        shadow:0,
        spinner:"spinner0",
        stopLoop:"off",
        stopAfterLoops:-1,
        stopAtSlide:-1,
        shuffle:"off",
        autoHeight:"off",
        disableProgressBar:"on",
        hideThumbsOnMobile:"off",
        hideSliderAtLimit:0,
        hideCaptionAtLimit:0,
        hideAllCaptionAtLilmit:0,
        debugMode:false,
        fallbacks: {
            simplifyAll:"off",
            nextSlideOnWindowFocus:"off",
            disableFocusListener:false,
        }
      });
    }
  });


/* (homepage -4 )*/
tpj(document).ready(function() {
  if(tpj("#rev_slider_3_2").revolution == undefined){
      revslider_showDoubleJqueryError("#rev_slider_3_2");
    }else{
      revapi41 = tpj("#rev_slider_3_2").show().revolution({
        sliderType:"carousel",
        sliderLayout:"fullwidth",
        visibilityLevels:"1240,1240,778,480",
        gridwidth:"1600,1600,778,480",
        gridheight:"645,645,450,330",
        minHeight:"",
        spinner:"spinner0",
        editorheight:"645,768,450,330",
        responsiveLevels:"1240,1240,778,480",
        disableProgressBar:"on",
        carousel: {
          space:"1000px",
          border_radius:"10px"
        },
        navigation: {
          onHoverStop:false
        },
        fallbacks: {
          allowHTML5AutoPlayOnAndroid:true
        },
      });
    }
  });


/* (homepage -5 )*/
tpj(document).ready(function() {
  if(tpj("#rev_slider_9_1").revolution == undefined){
      revslider_showDoubleJqueryError("#rev_slider_9_1");
    }else{
      revapi41 = tpj("#rev_slider_9_1").show().revolution({
        visibilityLevels:"1240,1240,778,480",
        gridwidth:"1680,1680,778,480",
        gridheight:"790,790,450,330",
        minHeight:"",
        spinner:"spinner0",
        maxHeight:"1680px",
        editorheight:"790,529,450,330",
        responsiveLevels:"1240,1240,778,480",
        disableProgressBar:"on",
        navigation: {
                  mouseScrollNavigation:false,
                  onHoverStop:false,
                  arrows: {
            enable:true,
            style:"uranus",
            hide_onmobile:true,
            hide_under:778,
            hide_onleave:true,
            left: {
              h_offset:30
            },
            right: {
              h_offset:30
            }
          }
                },
        fallbacks: {
          allowHTML5AutoPlayOnAndroid:true
        },
      });
    }
  });


/* (app-landing )*/
tpj(document).ready(function() {
  if(tpj("#rev_slider_8_1").revolution == undefined){
      revslider_showDoubleJqueryError("#rev_slider_8_1");
    }else{
      revapi41 = tpj("#rev_slider_8_1").show().revolution({
        sliderLayout:"fullwidth",
        visibilityLevels:"1240,1240,778,480",
        gridwidth:"1240,1240,778,480",
        gridheight:"1160,1000,580,400",
        minHeight:"",
        spinner:"spinner0",
        editorheight:"1160,768,580,400",
        responsiveLevels:"1240,1240,778,480",
        disableProgressBar:"on",
        navigation: {
          onHoverStop:false
        },
        parallax: {
                  levels:[3,6,9,12,15,-3,-6,-9,-12,-15,47,48,49,50,51,30],
                  type:"mousescroll",
                  origo:"slidercenter",
                  speed:0
                },
        fallbacks: {
          allowHTML5AutoPlayOnAndroid:true
        },
      });
    }
  });
