/**
 * Created by Izwayyed on 2/20/2015.
 */
function checkname()
{
    var namefield = document.getElementById("namefield");
    var ac = document.getElementById("acname");
    ac.disabled=false;
    namefield.value="";
    namefield.disabled=true;



}



function checkac()
{
    var namefield = document.getElementById("namefield");
    var ac = document.getElementById("acname");
    namefield.disabled=false;
    ac.value="";
    ac.disabled=true;



}


function reset() {
    var namefield = document.getElementById("namefield");
    var ac = document.getElementById("acname");
    namefield.disabled=false;
    ac.disabled=false;
}