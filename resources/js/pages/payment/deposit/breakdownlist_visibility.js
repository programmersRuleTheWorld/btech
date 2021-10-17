    if (window.location.pathname == '/deposit') 
    {
        var cardHeaders = document.getElementsByClassName('bl-header');
        var cardHeaderStates = document.getElementsByClassName('bl-header-state');
        var cardBodies = document.getElementsByClassName('bl-body');
        for(var i = 0; i <= cardBodies.length -1; i++)
        {
            cardBodies[i].style.display = 'none';
            cardHeaderStates[i].textContent = ' [HIDE MODE]';

            
            cardHeaders[i].onclick = function()
            {
                if(this.parentNode.children[1].style.display == 'none')
                {
                    this.children[0].children[3].textContent = '[VIEW MODE]';
                    this.parentNode.children[1].style.display = 'block';
                }
                else if(this.parentNode.children[1].style.display = 'block')
                {
                    this.children[0].children[3].textContent = '[HIDE MODE]';
                    this.parentNode.children[1].style.display = 'none';
                }
            }
        }        
    }