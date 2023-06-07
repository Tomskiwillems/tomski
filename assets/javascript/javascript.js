

function addEventsToDocument()
{
    console.log('hallo')
    addEventToMultipleElements(".link", "click", clickLink)
    addEventToMultipleElements(".submit", "click", clickSubmit)
}

//  =============================================

//window.addEventListener('load', addEventsToDocument)

//  =============================================

const addEventToMultipleElements = (classname, eventtrigger, functionname) =>
{
    console.log(document.querySelectorAll(classname))
    document.querySelectorAll(classname).forEach(element =>
    {
        element.addEventListener(eventtrigger, functionname)
    })
}

//  =============================================

(function (fn) 
{
    console.log('hoi')
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

const clickLink = (e) =>
{
    let page = e.target.getAttribute('data-id')
    let url = 'index.php?page=' + page + '&action=Ajax&func=NewPage'
    ajaxGet(url, 'json', callback_success, callback_fail)
}

//  =============================================

const clickSubmit = () =>
{
    console.log('hoi')
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
        console.log(data[i].target)
        console.log(data[i].content)
        console.log(document.querySelector(data[i].target))
        document.querySelector(data[i].target).outerHTML = data[i].content
        //document.querySelector(data[i].target).replaceWith(data[i].content)
    }
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