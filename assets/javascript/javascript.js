function addEventsToDocument()
{
    addEventToMultipleElements(".menu-item", "click", clickMenuItem)
    addEventToMultipleElements(".submit", "click", clickSubmit)
}

//  =============================================

const addEventToMultipleElements = (classname, eventtrigger, functionname) =>
// checks whether the elements have an event on it, if not, adds an event and a attribute show the element has an event
{
    document.querySelectorAll(classname).forEach(element =>
    {
        if (!element.hasAttribute('data-event'))
        {
            element.addEventListener(eventtrigger, functionname)
            element.setAttribute('data-event', true)
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
    let page = e.target.getAttribute('data-id')
    let url = 'index.php?page=' + page + '&action=Ajax&func=NewPage'
    ajaxGet(url, 'json', callback_success, callback_fail)
}

//  =============================================

const clickSubmit = () =>
{
    let form = document.getElementById("form")
    let data = new FormData(form)
    let url = 'index.php?action=Ajax&func=NewPage'
    ajaxPost(url, data, 'json', callback_success, callback_fail)
}

//  =============================================

const callback_success = (data) =>
{
    for (i = 0; i < data.length; i++)
    {
        document.querySelector(data[i].target).outerHTML = data[i].content
    }
    addEventsToDocument()
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
        callback_succes(result);
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
        callback_succes(result);
    } 
    else
    {
        callback_fail(response.statusText);
    }
}