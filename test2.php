<?php ?>
<button onclick="notifyMe()">Notify me!</button>
<button id="enable">Activer les notifications</button>

<script>
//lancer la fonction askNotificationPermission () quand le bouton avec l'id notification est cliqué
document.getElementById('notification').addEventListener('click', askNotificationPermission);
function askNotificationPermission() {
  // La fonction qui sert effectivement à demander la permission
  function handlePermission(permission) {
    // On affiche ou non le bouton en fonction de la réponse
    if(Notification.permission === 'denied' || Notification.permission === 'default') {
      notificationBtn.style.display = 'block';
    } else {
      notificationBtn.style.display = 'none';
    }
  }

  // Vérifions si le navigateur prend en charge les notifications
  if (!('Notification' in window)) {
    console.log("Ce navigateur ne prend pas en charge les notifications.");
  } else {
    if(checkNotificationPromise()) {
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

      const n = new Notification('Une super chanson');
      document.addEventListener('visibilitychange', function() {
      if (document.visibilityState === 'visible') {
         // L'onglet est désormais visible et la notification n'est plus pertinente
         // on peut la fermer
         n.close();
      }
});





/* function notifyMe() {
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }

  // Let's check whether notification permissions have already been granted
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
    let notification = new Notification("Hi there!");
  }

  // Otherwise, we need to ask the user for permission
  else if (Notification.permission !== "denied") {
    Notification.requestPermission().then(function (permission) {
      // If the user accepts, let's create a notification
      if (permission === "granted") {
        let notification = new Notification("Hi there!");
      }
    });
  }
  

  // At last, if the user has denied notifications, and you
  // want to be respectful there is no need to bother them anymore.
} */

</script>