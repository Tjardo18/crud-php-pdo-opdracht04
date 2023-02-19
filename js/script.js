function tijdValue() {

    let timeElapsed = Date.now(),
        today = new Date(timeElapsed),
        time = today.toISOString();

    document.querySelector("#timeSend").value = time;

}