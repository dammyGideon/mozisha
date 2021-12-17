require('./bootstrap');

Echo.private('uEo4MlNk4xy8lyH6J5vj1622368007ebPACFVf5IwzjULAhToP')
    .listen('ChatEvent', (e) => {
        console.log('Soething came');
    });
