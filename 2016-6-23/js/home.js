/**
 * Created by User on 2016/6/25.
 */
$("document").ready(function(){
    var center1 = $('h2');
    var center2 = $('p');
    for(var i=0; i<center1.length; i++) {
        center1[i].onmouseover = function() {
            document.querySelector('.p' + this.getAttribute('a')).style.display = 'block';
        }
    }
    for(var i=0; i<center1.length; i++) {
        center1[i].onmouseout = function() {
            document.querySelector('.p' + this.getAttribute('a')).style.display = 'none';
        }
    }
    for(var i=0; i<center2.length; i++) {
        center2[i].onmouseover = function() {
            document.querySelector('.p' + this.getAttribute('b')).style.display = 'block';
        }
    }
    for(var i=0; i<center1.length; i++) {
        center2[i].onmouseout = function() {
            document.querySelector('.p' + this.getAttribute('b')).style.display = 'none';
        }
    }



})