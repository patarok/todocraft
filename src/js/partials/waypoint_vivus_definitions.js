import Vivus from "vivus";

function fillDrawn(idToFill){
    var subject = document.getElementById(idToFill);
    var subjectPaths = subject.getElementsByTagName('path');

    subjectPaths.forEach(fillUp);

    function fillUp(item) {
        item.classList.toggle("fillable");
        item.classList.toggle("fill");
    }
}

var appearEx = new Vivus('animIcon', {
    type: 'scenario',
    delay: 0,
    duration: 650,
    animTimingFunction: Vivus.EASE,
    start: 'manual'
});
    /* DECLARING WAYPOINTS IN HERE SO MEASURES ARE VALID */

    /* sustainability waypoint START */
    //var sustE = document.getElementById('athWP');
    var sustWP = new Waypoint.Inview({
    element: document.getElementById('sustWP'),
    enter: function(direction) {
          appearEx.play(2);
          document.getElementById('sustWP').classList.add("flyInR");
        },
    entered: function(direction) {
      setTimeout(function(){ fillDrawn('animIcon'); }, 2400);
        sustWP.destroy(); // waypoint only exists until entered ... so we avoid firing multiple times
    }
    });
    /* sustainability waypoint END */

