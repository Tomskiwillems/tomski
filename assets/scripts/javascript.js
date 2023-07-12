const addEventToMultipleElements = (classname, eventtrigger, functionname) =>
// checks whether the elements have an event on it, if not, adds an event and a attribute to show the element has an event
{
    document.querySelectorAll(classname).forEach(element =>
    {
        if (!element.hasAttribute('data-event'))
        {
            element.addEventListener(eventtrigger, functionname);
            element.setAttribute('data-event', true);
        }
    })
}

//  =============================================

const addEventsToDocument = () =>
{
    addEventToMultipleElements(".menu-item", "click", clickMenuItem);
    addEventToMultipleElements(".submit", "click", clickSubmit);
    addEventToMultipleElements(".dropdown-button", "click", clickDropdownButton);
    addEventToMultipleElements(".dropdown-option", "click", clickDropdownOption);
    addEventToMultipleElements(".parentfolder", "click", clickFolder);
    addEventToMultipleElements(".folder", "click", clickFolder);
    addEventToMultipleElements(".file", "click", clickFile);
    addEventToMultipleElements("textarea", "input", textareaAdjust)
}

//  =============================================

const setMenuStyle = () =>
{
    document.querySelectorAll('.menu-item').forEach(element =>
    {
        element.style.removeProperty('background');
    })
    let url = new URL(window.location.href);
    let page = url.searchParams.get('page');
    if (page) document.querySelector('a[data-id="' + page + '"]').style.background = 'rgba(0,0,0,0.3)';
    switch (page)
    {
        case "2":
            document.querySelector('a[data-id="7"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "3":
            document.querySelector('a[data-id="10"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "4":
            document.querySelector('a[data-id="14"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "5":
            document.querySelector('a[data-id="17"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "7":
        case "8":
        case "9":
            document.querySelector('a[data-id="2"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "10":
        case "11":
        case "12":
        case "13":
            document.querySelector('a[data-id="3"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "14":
        case "15":
        case "16":
            document.querySelector('a[data-id="4"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "17":
        case "18":
        case "19":
        case "20":
            document.querySelector('a[data-id="5"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        default:
            if (page == null) document.querySelector('a[data-id="1"]').style.background = 'rgba(0,0,0,0.3)';
    }
}

//  =============================================

const addJavaToDocument = () =>
{
    addEventsToDocument();
    setMenuStyle();
}

//  =============================================

(function (fn)
// checks whether the document is fully loaded 
{
    if (document.readyState === "complete" || document.readyState === "interactive") 
    {
        // call on next available tick
        setTimeout(fn, 1);
    } 
    else
    {
        document.addEventListener("DOMContentLoaded", fn);
    }
}(addJavaToDocument));

//  =============================================

const clickMenuItem = (e) =>
{
    let page = e.target.getAttribute('data-id');
    let menu = e.target.parentNode.parentNode.parentNode.getAttribute('class');
    let target;
    if (menu == 'submenulist') {target = '.subpagecontent'}
    else if (menu == 'mainmenulist') {target = '.pagecontent'}
    else {target = 'body'};
    let url = 'index.php?page=' + page + '&action=Ajax&func=NewPage&target=' + target;
    ajaxGet(url, 'json', callback_success, callback_fail);
}

//  =============================================

const clickSubmit = (e) =>
{
    let form = document.getElementById("form");
    let data = new FormData(form);
    let page = data.get('page');
    let url = 'index.php?page=' + page + '&action=Ajax&func=NewPage&target=body';
    ajaxPost(url, data, 'json', callback_success, callback_fail);
}

//  =============================================

const clickDropdownButton = (e) =>
{
    let dropdownbutton = e.target.closest('.dropdown-button');
    let dropdowncontent = dropdownbutton.nextElementSibling;
    if (dropdowncontent.style.display === "block")
    {
        dropdowncontent.style.display = "none";
        dropdownbutton.style.removeProperty('background');
    }
    else
    {
        dropdowncontent.style.display = "block";
        dropdownbutton.style.background = 'rgba(0,0,0,0.3)';
        addEventsToDocument();
    }
}

//  =============================================

const clickDropdownOption = (e) =>
{
    let href = window.location.href;
    let urlparams = new URLSearchParams(window.location.search);
    let page = urlparams.get('page');
    let language = e.target.closest('.dropdown-option').getAttribute('value');
    let url;
    if (page)
    {
        url = href + '&action=Ajax&func=NewPage&language=' + language;
    }
    else
    {
        url = href + '?action=Ajax&func=NewPage&language=' + language;
    }
    
    
    ajaxGet(url, 'json', callback_success, callback_fail);
}

//  =============================================

const clickFolder = (e) =>
{
    let folder = e.target.getAttribute('data-folder');
    let page = e.target.getAttribute('data-page');
    let url = 'index.php?page=' + page + '&folder=' + folder + '&action=Ajax&func=NewPage&target=.subpagecontent';
    ajaxGet(url, 'json', callback_success, callback_fail);
}

//  =============================================

const clickFile = (e) =>
{
    let file = e.target.getAttribute('data-file');
    let page = e.target.getAttribute('data-page');
    let url = 'index.php?page=' + page + '&file=' + file + '&action=Ajax&func=NewPage&target=.subpagecontent';
    ajaxGet(url, 'json', callback_success, callback_fail);
}

//  =============================================

const textareaAdjust = (e) =>
{
    e.target.style.height = "0px";
    if (65 > e.target.scrollHeight)
    {
        e.target.style.height = "65px";
    }
    else
    {
        e.target.style.height = e.target.scrollHeight + "px";
    }
}

//  =============================================

const callback_success = (data, url) =>
{
    for (i = 0; i < data.length; i++)
    {
        if (data[i].target == 'body')
        {
            document.querySelector(data[i].target).innerHTML = data[i].content;
        }
        else
        {
            document.querySelector(data[i].target).outerHTML = data[i].content;
        }
    }
    let symbol = url.split('action')[0].slice(-1);
    if (document.querySelector('.message'))
    {
        let page = document.querySelector('.message').getAttribute("data-page");
        let new_url = url.split('page=')[0] + 'page=' + page;
        history.pushState('', '', new_url);
    }
    else if (symbol == '&')
    {
        history.pushState('', '', url.split('&action')[0]);
    }
    else if (symbol == '?')
    {
        history.pushState('', '', url.split('?action')[0]);
    }
    addJavaToDocument();
}

//  =============================================

const callback_fail = (error) =>
{
    
}

//  =============================================

async function ajaxGet(url, responsetype, callback_succes, callback_fail)
{
    let response = await fetch(
        url, 
        {
            method: 'GET',
        }
    );
    if (response.ok) // if HTTP-status is 200-299
    { 
        let result = '';   
        switch (responsetype)
        {
            case 'json' :    
                result = await response.json();
                break;
            case 'xml' :    
                data = await response.text();
                const parser = new DOMParser();
                result = parser.parseFromString(data, "application/xml");
                break;
            default:
                result = await response.text();
        }
        callback_succes(result, url);
    } 
    else
    {
        let error = await response.text();
        callback_fail(error);
    }    
}

//  =============================================

async function ajaxPost(url, data, responsetype, callback_succes, callback_fail)
{
    let response = await fetch(
        url,
        {
            method: 'POST',
            body: data
        }
    );
    if (response.ok) // if HTTP-status is 200-299
    { 
        let result = '';
        
        switch (responsetype)
        {
            case 'json' :    
                result = await response.json();
                break;
            case 'xml' :    
                data = await response.text();
                const parser = new DOMParser();
                result = parser.parseFromString(data, "application/xml");
                break;
            default:
                result = await response.text();
        }   
        callback_succes(result, url);
    } 
    else
    {
        callback_fail(response.statusText);
    }
}

