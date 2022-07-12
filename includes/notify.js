//lancer la fonction askNotificationPermission () quand le bouton avec l'id notification est cliqué
document.getElementById('notification').addEventListener('click', askNotificationPermission);

function askNotificationPermission() {
    // La fonction qui sert effectivement à demander la permission
    function handlePermission(permission) {
        // On affiche ou non le bouton en fonction de la réponse
        if (Notification.permission === 'denied' || Notification.permission === 'default') {
            notificationBtn.style.display = 'block';
        } else {
            notificationBtn.style.display = 'none';
        }
    }

    // Vérifions si le navigateur prend en charge les notifications
    if (!('Notification' in window)) {
        console.log("Ce navigateur ne prend pas en charge les notifications.");
    } else {
        if (checkNotificationPromise()) {
            Notification.requestPermission()
                .then((permission) => {
                    handlePermission(permission);
                })
        } else {
            Notification.requestPermission(function(permission) {
                handlePermission(permission);
            });
        }
    }
}