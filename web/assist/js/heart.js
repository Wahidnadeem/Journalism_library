function h1(heartId){
   let iconHeart1 = document.querySelector(heartId);
    let iconHeart1Button = iconHeart1.parentNode;
    let heartbeatInterval1 = {from: 1, to: 40};
    let distanceThreshold1 = {min: 0, max: 100};
    let grayscaleInterval = {from: 1, to: 0};
    let lineEq1 = (y2, y1, x2, x1, currentVal) => {
        var m = (y2 - y1) / (x2 - x1), b = y1 - m * x1;
        return m * currentVal + b;
    };
    
    let tweenHeart = TweenMax.to(iconHeart1, 5, {
        yoyoEase: Power2.easeOut,
        repeat: -1,
        yoyo: true,
        scale: 1.3,
        paused: true
    });
    
    let stateHeart = 'paused';
    new Nearby(iconHeart1Button, {
        onProgress: (distance) => {
            let time = lineEq1(heartbeatInterval1.from, heartbeatInterval1.to, distanceThreshold1.max, distanceThreshold1.min, distance);
            tweenHeart.timeScale(Math.min(Math.max(time,heartbeatInterval1.from),heartbeatInterval1.to));
            if ( distance < distanceThreshold1.max && distance >= distanceThreshold1.min && stateHeart !== 'running' ) {
                tweenHeart.play();
                stateHeart = 'running';
            }
            else if ( (distance > distanceThreshold1.max || distance < distanceThreshold1.min) && stateHeart !== 'paused' ) {
                tweenHeart.pause();
                stateHeart = 'paused';
                TweenMax.to(iconHeart1, .2, {
                    ease: Power2.easeOut,
                    scale: 1,
                    onComplete: () => tweenHeart.time(0)
                });
            }
    
            let bw = lineEq1(grayscaleInterval.from, grayscaleInterval.to, distanceThreshold1.max, distanceThreshold1.min, distance);
            TweenMax.to(iconHeart1, 1, {
                ease: Power2.easeOut,
                filter: `grayscale(${Math.min(bw,grayscaleInterval.from)})`
            });
        }
    });
}
if (document.getElementById('ih0') != null) {
    h1('#ih0');
}
if (document.getElementById('ih1') != null) {
    h1('#ih1');
}
if (document.getElementById('ih2') != null) {
    h1('#ih2');
}
if (document.getElementById('ih3') != null) {
    h1('#ih3');
}
if (document.getElementById('ih4') != null) {
    h1('#ih4');
}
if (document.getElementById('ih5') != null) {
    h1('#ih5');
}
if (document.getElementById('ih6') != null) {
    h1('#ih6');
}
if (document.getElementById('ih7') != null) {
    h1('#ih7');
}

if (document.getElementById('ih8') != null) {
    h1('#ih8');
}
if (document.getElementById('ih9') != null) {
    h1('#ih9');
}
if (document.getElementById('ih10') != null) {
    h1('#ih10');
}
if (document.getElementById('ih11') != null) {
    h1('#ih11');
}
if (document.getElementById('ih12') != null) {
    h1('#ih12');
}
if (document.getElementById('ih13') != null) {
    h1('#ih13');
}
