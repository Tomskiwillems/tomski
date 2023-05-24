window.onpopstate = () =>
{
    pageHistory(document.location);
}

$(document).ready(function ()
{
    $(document).on("click", "#link", changePageContent);
    $(document).on("click", "#submit", handleForm);
});

function pageHistory(url)
{
    $.ajax
    ({
        type: 'GET',
        cache: false,
        url: url + '&action=ajax&func=NewPage',
        datatype: 'json',
        success: function (data)
        {
            $.each(data, function (i)
            {
                let element = data[i];
                $(element.target).replaceWith(element.content);
            })
        }
    })
}

function changePageContent()
{
    let page = parseInt($(this).attr('data-id'));
    let url = 'index.php?page=' + page + '&action=ajax&func=NewPage';
    $.ajax
    ({
        type: 'GET',
        cache: false,
        url: url,
        datatype: 'json',
        success: function (data)
        {
            $.each(data, function (i)
            {
                let element = data[i];
                $(element.target).replaceWith(element.content);
            })
            history.pushState({page: page}, "", url.replace('&action=ajax&func=NewPage', ''));
        },
        error: function (data)
        {
            console.log(data);
        },
    })
}

function handleForm()
{
    let form = document.getElementById("form");
    let formData = new FormData(form);

    $.ajax
    ({
        type: "POST",
        cache: false,
        url: "index.php?action=ajax&func=NewPage",
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data)
        {
            $.each(data, function (i)
            {
                let element = data[i];
                $(element.target).replaceWith(element.content);
            })
        }
    })
}