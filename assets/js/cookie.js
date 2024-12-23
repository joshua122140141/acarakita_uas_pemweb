// Function to create or update a cookie
function setCookie(name, value, days) {
    const date = new Date()
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000)
    const expires = "expires=" + date.toUTCString()
    document.cookie = `${name}=${encodeURIComponent(value)};${expires};path=/`
}

// Function to get the value of a cookie by its name
function getCookie(name) {
    const decodedCookies = decodeURIComponent(document.cookie)
    const cookies = decodedCookies.split(";")
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i].trim()
        if (cookie.startsWith(name + "=")) {
            return cookie.substring(name.length + 1)
        }
    }
    return null
}

// Function to delete a cookie
function deleteCookie(name) {
    document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`
}

function clearCookies() {
    const cookies = document.cookie.split(";")
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i].trim()
        let name = cookie.split("=")[0]
        deleteCookie(name)
    }
}
