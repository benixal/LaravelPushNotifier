<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        navigator.serviceWorker.register("sw.js");

        function requestPermission() {
            Notification.requestPermission().then((permission) => {
                if (permission === 'granted') {
                    
                    // get service worker
                    navigator.serviceWorker.ready.then((sw) =>{
                        
                        // subscribe
                        sw.pushManager.subscribe({
                            userVisibleOnly: true,
                            applicationServerKey:"BC5zel9JoqeOY2yVTJjDhiE1IisJTVHq-_p4rxC3zd60gQSqXzra_7_m7B12axwI42tZIUXYGXhIJ-t5MolKjNY"
                        }).then((subscription) => {

                            // subscription successful
                            fetch("/api/push-subscribe", {
                                method: "post",
                                body:JSON.stringify(subscription)
                            }).then( alert("ok") );
                        });
                    });
                }
            });
        }
    </script>
    <button onclick="requestPermission()">Enable Notification</button>
</body>
</html>