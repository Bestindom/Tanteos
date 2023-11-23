function createCookie()
{
    let x = document.forms["myForm"]["cookieName"].value;
    let y = document.forms["myForm"]["cookieValue"].value;

    document.cookie = x + " = " + y;
    alert (document.cookie);
}



function getCookie(cookieName)
{
    let cookies = document.cookie.split(';');

    for (let i = 0; i < cookies.length; i++)
    {
        // delete white gaps
        let cookie = cookies[i].trim();
        if (cookie.startsWith(cookieName + '=')) {
            // we put +1 to no set '=' in the answer
            // substring extract part of string
            return cookie.substring(cookieName.length + 1);
        }
    }
    return null;
}



function searchCookie()
{
    let cookieName = document.forms["searchForm"]["cookieName"].value;
    let answer = document.getElementById("answearSearch");
    let cookieValue = getCookie(cookieName);

    if (cookieValue) 
    {
        answer.innerHTML = 'Tu cookie ' + cookieName + ' = ' + cookieValue;
    }
    else
    {
        answer.innerHTML = 'no va :)';
    }
    // IMPORTANT to not send the form and can see the innerHTML :)
    return false;
}

function deleteCookie()
{
    let cookieName = document.forms["deleteForm"]["cookieName"].value;
    let answer = document.getElementById("answearDelete");
    let cookieValue = getCookie(cookieName);

    if (cookieValue) 
    {
        document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        alert('Your cookie ' + cookieName + ' = ' + cookieValue + ' has been deleted succesfully :)');
    }
    else
    {
        answer.innerHTML = "This cookie dosen't exist";
        return fale;
    }

}






function showCookies()
{
    let allCookies = document.cookie;

    if (allCookies) {
        alert("Todas las cookies:\n" + allCookies);
    } else {
        alert("No hay cookies.");
    }
}