function addEventsToDocument()
{
    addEventToMultipleElements(".menu-item", "click", clickMenuItem);
    addEventToMultipleElements(".submit", "click", clickSubmit);
    addEventToMultipleElements(".dropdown-button", "click", clickDropdownButton);
    addEventToMultipleElements(".dropdown-option", "click", clickDropdownOption);
}

//  =============================================

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
}(addEventsToDocument));

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
    ajaxGet(url, 'json', callback_success, callback_fail, e);
}

//  =============================================

const clickSubmit = (e) =>
{
    let form = document.getElementById("form");
    let data = new FormData(form);
    let url = 'index.php?action=Ajax&func=NewPage';
    ajaxPost(url, data, 'json', callback_success, callback_fail, e);
}

//  =============================================

const clickDropdownButton = (e) =>
{
    if (e.target.nextElementSibling.style.display === "block")
    {
        e.target.nextElementSibling.style.display = "none";
        e.target.style.removeProperty('background');
    }
    else
    {
        e.target.nextElementSibling.style.display = "block";
        e.target.style.background = 'rgba(0,0,0,0.3)';
        addEventsToDocument();
    }
}

//  =============================================

const clickDropdownOption = (e) =>
{
    let href = window.location.href;
    let language = e.target.getAttribute('value');
    let url = href + '&action=Ajax&func=NewPage&language=' + language;
    ajaxGet(url, 'json', callback_success, callback_fail, e);
}

//  =============================================

const changeMenuStyle = (e) =>
{
    document.querySelectorAll('.menu-item').forEach(element =>
    {
        element.style.removeProperty('background');
    })
    let url = new URL(window.location.href);
    let page = url.searchParams.get('page');
    switch (page)
    {
        case "2":
        case "7":
            document.querySelector('a[data-id="2"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="7"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "3":
        case "10":
            document.querySelector('a[data-id="3"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="10"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "4":
        case "14":
            document.querySelector('a[data-id="4"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="14"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "5":
        case "17":
            document.querySelector('a[data-id="5"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="17"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "6":
            document.querySelector('a[data-id="6"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "8":
            document.querySelector('a[data-id="2"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="8"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "9":
            document.querySelector('a[data-id="2"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="9"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "11":
            document.querySelector('a[data-id="3"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="11"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "12":
            document.querySelector('a[data-id="3"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="12"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "13":
            document.querySelector('a[data-id="4"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="13"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "15":
            document.querySelector('a[data-id="4"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="15"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "16":
            document.querySelector('a[data-id="4"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="16"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "18":
            document.querySelector('a[data-id="5"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="18"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "19":
            document.querySelector('a[data-id="5"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="19"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        case "20":
            document.querySelector('a[data-id="5"]').style.background = 'rgba(0,0,0,0.3)';
            document.querySelector('a[data-id="20"]').style.background = 'rgba(0,0,0,0.3)';
            break;
        default:
            document.querySelector('a[data-id="1"]').style.background = 'rgba(0,0,0,0.3)';
    }
}

//  =============================================

const callback_success = (data, url, e) =>
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
    history.pushState('', '', url.split('&')[0]);
    changeMenuStyle(e);
    addEventsToDocument();
}

//  =============================================

const callback_fail = (error) =>
{
    
}

//  =============================================

async function ajaxGet(url, responsetype, callback_succes, callback_fail, e)
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
        callback_succes(result, url, e);
    } 
    else
    {
        let error = await response.text();
        callback_fail(error);
    }    
}

//  =============================================

async function ajaxPost(url, data, responsetype, callback_succes, callback_fail, e)
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
        callback_succes(result, url, e);
    } 
    else
    {
        callback_fail(response.statusText);
    }
}