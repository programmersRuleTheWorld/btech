//client application ajax event implementation

    if(window.location.pathname == '/admin' || window.location.pathname == '/admin/querySearch') 
    {
        var searchTab = document.getElementById('searchTab');

        searchTab.onchange = function()
        {
            console.log(searchTab.value)
            if(searchTab.value == 5)
            {
                var queryTab = document.getElementById('queryTab');

                queryTab.outerHTML = 
                "<select id='queryTab' class='form-control mb-2' name='searchString'>"
                +"<option value='follow-up'>Follow Up</option>"
                +"<option value='on-time'>On Time</option>"
                +"<option value='late'>Late</option>"
                +"<option value='urgent'>Urgent</option>"
                +"<option value='unpaid'>Unpaid</option>"
                +"<option value='complete'>Complete</option>"             
                +"<option value='refund'>Refund</option>"             
                +"</select>";
            }
            else
            {
                var queryTab = document.getElementById('queryTab');

                queryTab.outerHTML = "<input class='form-control mb-2' type='text' id='queryTab' name='searchString'>";
            }
        }
    }