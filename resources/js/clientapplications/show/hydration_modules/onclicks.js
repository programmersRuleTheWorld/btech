require('./libs')

if(document.getElementsByClassName('biCreateButton').length > 0)
{
    var biCreateButtons = document.getElementsByClassName('biCreateButton');
    var biList = Array.from(document.getElementsByClassName('biList'));
    
    for(i=0;i<biCreateButtons.length;i++)
    {
        biCreateButtons[i].onclick = biCreate
    }
}

if(document.getElementsByClassName('biDeleteButton').length > 0)
{
    var biDeleteButtons = document.getElementsByClassName('biDeleteButton');
    
    for(i=0;i<biDeleteButtons.length;i++)
    {
        biDeleteButtons[i].onclick = biDelete, biPriceUpdate
    }
}


if(document.getElementsByClassName('biPriceUpdateButton').length > 0)
{
    var biPriceUpdateButtons = document.getElementsByClassName('biPriceUpdateButton');
    for(i=0;i<biPriceUpdateButtons.length;i++)
    {
        biPriceUpdateButtons[i].onclick = biPriceUpdate
    }
}

if(document.getElementsByClassName('biStatusUpdateButton').length > 0)
{
    var biStatusUpdateButtons = document.getElementsByClassName('biStatusUpdateButton');
    
    for(i=0;i<biStatusUpdateButtons.length;i++)
    {
        biStatusUpdateButtons[i].onclick = biStatusUpdate
    }
}

if(document.getElementsByClassName('blCreateButton').length > 0)
{
    var blTitle = document.getElementById('blTitle');
    var blDateField = document.getElementById('blDateField');
    window.blDescription = document.getElementById('item_description');
    var blCreateButton = document.getElementsByClassName('blCreateButton');
    
    blCreateButton[0].onclick = blCreate
}

if(document.getElementsByClassName('blDeleteButton').length > 0)
{
    var blField = document.getElementsByClassName('blField');
    var blDeleteButtons = document.getElementsByClassName('blDeleteButton');
    
    for(i=0;i<blDeleteButtons.length;i++)
    {
        blDeleteButtons[i].onclick = blDelete
    }
}

if(document.getElementsByClassName('blDateUpdateButton').length > 0)
{
    var blDateUpdateButtons = document.getElementsByClassName('blDateUpdateButton');
    for(i=0;i<blDateUpdateButtons.length;i++)
    {
        blDateUpdateButtons[i].onclick = blDueDateUpdate
    }
}