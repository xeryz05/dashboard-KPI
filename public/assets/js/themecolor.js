const handleThemeUpdate = (cssVars) => {
    const root = document.querySelector(':root');
    const keys = Object.keys(cssVars);
    keys.forEach(key => {
        root.style.setProperty(key, cssVars[key]);
    });
}

function dynamicPrimaryColor(primaryColor) {
    primaryColor.forEach((item) => {
        item.addEventListener('input', (e) => {
            const cssPropName = `--primary-${e.target.getAttribute('data-id')}`;
            const cssPropName1 = `--primary-${e.target.getAttribute('data-id1')}`;
            const cssPropName2 = `--primary-${e.target.getAttribute('data-id2')}`;
            handleThemeUpdate({
                [cssPropName]: e.target.value,
                // 95 is used as the opacity 0.95  
                [cssPropName1]: e.target.value + 95,
                [cssPropName2]: e.target.value,
            });
        });
    });
}
function dynamicBackgroundColor(BackgroundColor) {
    BackgroundColor.forEach((item) => {
        item.addEventListener('input', (e) => {
            const cssPropName = `--dark-${e.target.getAttribute('data-id3')}`;
            const cssPropName1 = `--dark-${e.target.getAttribute('data-id4')}`;
            handleThemeUpdate({
                [cssPropName]: e.target.value + 'dd',
                [cssPropName1]: e.target.value,
            });
        });
    });
}

(function() {
    
	'use strict'
    // Light theme color picker
    const dynamicPrimaryLight = document.querySelectorAll('input.color-primary-light');
    const dynamicBackground = document.querySelectorAll('input.background-primary-light');

    // themeSwitch(LightThemeSwitchers);
    dynamicPrimaryColor(dynamicPrimaryLight);
    dynamicBackgroundColor(dynamicBackground);

    localStorageBackup();
        
})();

function localStorageBackup() {
    
	'use strict'
    // if there is a value stored, update color picker and background color
    // Used to retrive the data from local storage
    if (localStorage.valexprimaryColor) {
        // document.getElementById('colorID').value = localStorage.valexprimaryColor;
        document.querySelector('html').style.setProperty('--primary-bg-color', localStorage.valexprimaryColor);
        document.querySelector('html').style.setProperty('--primary-bg-hover', localStorage.valexprimaryHoverColor);
        document.querySelector('html').style.setProperty('--primary-bg-border', localStorage.valexprimaryBorderColor);
    }

    if (localStorage.valexbgColor) {
        // document.getElementById('bgID').value = localStorage.valexbgColor;
        document.querySelector('html').style.setProperty('--dark-body', localStorage.valexbgColor);
        document.querySelector('html').style.setProperty('--dark-theme', localStorage.valexthemeColor);
        document.querySelector('body').classList.remove('light-theme');
        document.querySelector('body').classList.add('dark-theme');

    }

    if (localStorage.valexlighttheme) {
        document.querySelector("body")?.classList.add("light-theme");
        document.querySelector("body")?.classList.remove("dark-theme");
        $("#myonoffswitch1").prop("checked", true);
        $("#myonoffswitch3").prop("checked", true);
        $("#myonoffswitch6").prop("checked", true);
    }
    
    if (localStorage.valexdarktheme) {
        document.querySelector("body")?.classList.remove("light-theme");
        document.querySelector("body")?.classList.add("dark-theme");
        $("#myonoffswitch2").prop("checked", true);
        $("#myonoffswitch5").prop("checked", true);
        $("#myonoffswitch8").prop("checked", true);
    }

    if(localStorage.valexrtl) {
        document.querySelector('body').classList.add('rtl')
    }

    if(localStorage.valexhorizontal) {
        document.querySelector('body').classList.add('horizontal')
    }
    
    if(localStorage.valexhorizontalHover) {
        document.querySelector('body').classList.add('horizontal-hover')
    }

    if(localStorage.valexclosedmenu){
        document.querySelector('body').classList.add('closed-menu')
    }
    
    if(localStorage.valexicontextmenu){
        document.querySelector('body').classList.add('icontext-menu')
    }

    if(localStorage.valexiconoverlay){
        document.querySelector('body').classList.add('sideicon-menu')
    }

    if(localStorage.valexhoversubmenu){
        document.querySelector('body').classList.add('hover-submenu')
    }

    if(localStorage.valexhoversubmenu1){
        document.querySelector('body').classList.add('hover-submenu1')
    }

    if(localStorage.valexdoublemenu){
        document.querySelector('body').classList.add('double-menu')
    }

    if(localStorage.valexdoublemenutabs){
        document.querySelector('body').classList.add('double-menu-tabs')
    }

    if(localStorage.valexdefaultlogo){
        document.querySelector('body').classList.add('default-horizontal')
    }

    if(localStorage.valexcenterlogo){
        document.querySelector('body').classList.add('centerlogo-horizontal')
    }

    if(localStorage.valexbodystyle){
        document.querySelector('body').classList.add('body-style1')
    }

    if(localStorage.valexboxedwidth){
        document.querySelector('body').classList.add('layout-boxed')
    }

    if(localStorage.valexscrollable){
        document.querySelector('body').classList.add('scrollable-layout')
    }
    // MENUS

  // LIGHT MENU
  if (localStorage.valexLightmenu) {
    document.querySelector("body")?.classList.add("light-menu");
  }

  // DARK MENU
  if (localStorage.valexDarkmenu) {
    document.querySelector("body")?.classList.add("dark-menu");
  }

  // COLOR MENU
  if (localStorage.valexColormenu) {
    document.querySelector("body")?.classList.add("color-menu");
  }

  // GRADIENT MENU
  if (localStorage.valexGradientmenu) {
    document.querySelector("body")?.classList.add("gradient-menu");
  }

  // HEADERS

  // LIGHT HEADER
  if (localStorage.valexLightheader) {
    document.querySelector("body")?.classList.add("light-header");
  }

  // DARK HEADER
  if (localStorage.valexDarkheader) {
    document.querySelector("body")?.classList.add("dark-header");
  }

  // COLOR HEADER
  if (localStorage.valexColorheader) {
    document.querySelector("body")?.classList.add("color-header");
  }

  // GRADIENT HEADER
  if (localStorage.valexGradientheader) {
    document.querySelector("body")?.classList.add("gradient-header");
  }

  // LEFTMENU BG IMAGES

  if (localStorage.valexleftimage1) {
    document.querySelector("body")?.classList.add("leftbgimage1");
  }

  if (localStorage.valexleftimage2) {
    document.querySelector("body")?.classList.add("leftbgimage2");
  }

  if (localStorage.valexleftimage3) {
    document.querySelector("body")?.classList.add("leftbgimage3");
  }

  if (localStorage.valexleftimage4) {
    document.querySelector("body")?.classList.add("leftbgimage4");
  }

  if (localStorage.valexleftimage5) {
    document.querySelector("body")?.classList.add("leftbgimage5");
  }
}

// triggers on changing the color picker
function changePrimaryColor() {
    
	'use strict'

    var userColor = document.getElementById('colorID').value;
    localStorage.setItem('valexprimaryColor', userColor);
    // to store value as opacity 0.95 we use 95
    localStorage.setItem('valexprimaryHoverColor', userColor + 95);
    localStorage.setItem('valexprimaryBorderColor', userColor);

    // removing dark theme properties
    // document.querySelector('body').classList.add('light-theme');
    names()
}

function changeBackgroundColor() {
	'use strict'

    var userColor = document.getElementById('bgID').value;
    localStorage.setItem('valexbgColor', userColor + 'dd');
    localStorage.setItem('valexthemeColor', userColor);
    names()

    // removing light theme data 
    document.body.classList.add('dark-theme');
    document.body.classList.remove('light-theme');
    $('#myonoffswitch2').prop('checked', true);
    $('#myonoffswitch5').prop('checked', true);
    $('#myonoffswitch8').prop('checked', true);

    localStorage.setItem("valexdarktheme", true);
}

// to check the value is hexa or not
const isValidHex = (hexValue) => /^#([A-Fa-f0-9]{3,4}){1,2}$/.test(hexValue)

const getChunksFromString = (st, chunkSize) => st.match(new RegExp(`.{${chunkSize}}`, "g"))
    // convert hex value to 256
const convertHexUnitTo256 = (hexStr) => parseInt(hexStr.repeat(2 / hexStr.length), 16)
    // get alpha value is equla to 1 if there was no value is asigned to alpha in function
const getAlphafloat = (a, alpha) => {
        if (typeof a !== "undefined") { return a / 255 }
        if ((typeof alpha != "number") || alpha < 0 || alpha > 1) {
            return 1
        }
        return alpha
    }
    // convertion of hex code to rgba code 
function hexToRgba(hexValue, alpha) {
	'use strict'
    if (!isValidHex(hexValue)) { return null }
    const chunkSize = Math.floor((hexValue.length - 1) / 3)
    const hexArr = getChunksFromString(hexValue.slice(1), chunkSize)
    const [r, g, b, a] = hexArr.map(convertHexUnitTo256)
    return `rgba(${r}, ${g}, ${b}, ${getAlphafloat(a, alpha)})`
}


let myVarVal;

function names() {
    
	'use strict'
    let primaryColorVal = getComputedStyle(document.documentElement).getPropertyValue('--primary-bg-color').trim();

    //get variable
    myVarVal = localStorage.getItem("valexprimaryColor") || primaryColorVal;
    
    if(document.querySelector('#bar') !== null){
        indexbar();
    }
    if(document.querySelector('#vmap12') !== null){
        vectormap();
    } 
    if(document.querySelector('#chart') !== null){
        indexchart();
    }
    
    let colorData = hexToRgba(myVarVal || primaryColorVal, 0.1)
    document.querySelector('html').style.setProperty('--primary-1', colorData);

    let colorData1 = hexToRgba(myVarVal || primaryColorVal, 0.2)
    document.querySelector('html').style.setProperty('--primary-2', colorData1);

    let colorData2 = hexToRgba(myVarVal || primaryColorVal, 0.3)
    document.querySelector('html').style.setProperty('--primary-3', colorData2);

    let colorData3 = hexToRgba(myVarVal || primaryColorVal, 0.5)
    document.querySelector('html').style.setProperty('--primary-5', colorData3);

    let colorData4 = hexToRgba(myVarVal || primaryColorVal, 0.8)
    document.querySelector('html').style.setProperty('--primary-8', colorData4);
}
names()