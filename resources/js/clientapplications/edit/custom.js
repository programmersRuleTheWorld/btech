if(typeof(ref_id) != 'undefined' && window.location.pathname == '/clientapplications/' + ref_id.value + '/edit')
{
refId = document.getElementById('ref_id');
services = document.getElementById('services');
currentDiv = document.getElementById('project');
projectType = document.getElementById('project_type');
wrapper = document.getElementById('wrapper');

function makeFormRow(args)
{
    i = 0;
    this.tagName = document.createElement('div');
    this.tagName.className = 'row';
    this.tagName.id = 'form_row' + i;
    args = [args];
    args[0].forEach(args => this.tagName.appendChild(args));
    wrapper.appendChild(this.tagName)
    i++;
}

function makeFormField(tagName, className, id, innerText, placeholder)
{
    this.tagName = document.createElement(tagName);
    this.tagName.className = className;
    this.tagName.id = id;
    this.tagName.name = id;
    this.tagName.innerText = innerText;
    this.tagName.placeholder = placeholder;

    this.setDisplayState = function(display)
    {
        this.tagName.parentNode.parentNode.style.display = display;
        if(display == 'none')
        {
            this.tagName.value = null;
        }
        else if(display == 'block' && this.tagName.tagName == 'SELECT')
        {
            this.tagName.value = this.tagName.options[0].value;
        }
    }
}

function makeInput(inputType, id, innerText, placeholder)
{
//formRow = new makeFormField('div', 'row', 'form_row' + i, null, null );
formCol = new makeFormField('div', 'col-md-4 mt-auto', null, null, null);
formGroup = new makeFormField('div', 'form-group', null, innerText, null);
this.inputType = new makeFormField(inputType, 'form-control form-control-sm', id, null, placeholder);
//formRow.tagName.appendChild(formCol.tagName);
formCol.tagName.appendChild(formGroup.tagName);
formGroup.tagName.appendChild(this.inputType.tagName);
//wrapper.appendChild(formRow.tagName);

return formGroup, formCol, this.inputType;
}

//form creation

//create Web Design/Development dropdown general options

        existingSite = new makeInput(
        inputType = 'select', 
        id = 'existing_site', 
        innerText = 'Will this be a new or existing site?', 
        placeholder = null,
        );

        option1 = new Option('New', 'New');
        option2 = new Option('Existing', 'Existing');
        existingSite.tagName.add(option1);
        existingSite.tagName.add(option2);

        siteType = new makeInput(
        inputType = 'select', 
        id = 'site_type', 
        innerText = 'Will this be a personal or commercial site?', 
        placeholder = null,
        );

        option1 = new Option('Personal', 'Personal');
        option2 = new Option('Commercial', 'Commercial');
        siteType.tagName.add(option1);
        siteType.tagName.add(option2);

        govContract = new makeInput(
        inputType = 'select', 
        id = 'gov_contract', 
        innerText = 'Are you performing contract procurement for a United States government agency?', 
        placeholder = null,
        );

        option1 = new Option('No', 'No');
        option2 = new Option('Yes', 'Yes');
        govContract.tagName.add(option1);
        govContract.tagName.add(option2);

        whereHosted = new makeInput('input', 
        id = 'where_hosted', 
        innerText = 'Who is your current hosting provider?', 
        placeholder = 'Current hosting provider...'
        );

        siteURL = new makeInput('input', 
        id = 'site_url', 
        innerText = 'What is your website\'s current URL?', 
        placeholder = 'Enter your website\'s URL here...'
        );

        backendType = new makeInput('select',
        id = 'backend_type',
        innerText = 'What programming language is your project built on?',
        placeholder = null,
        );
        
        option1 = new Option('PHP');
        option2 = new Option('Python');
        option3 = new Option('Ruby');
        option4 = new Option('Java');
        option5 = new Option('Node');
        backendType.tagName.add(option1);
        backendType.tagName.add(option2);
        backendType.tagName.add(option3);
        backendType.tagName.add(option4);
        backendType.tagName.add(option5);

        backendFramework = new makeInput('select',
        id = 'backend_framework',
        innerText = 'Does your site utilize a backend framework?',
        placeholder = null,
        );

        option1 = new Option('No', 'No');
        option1.select = 1;
        option2 = new Option('Yes', 'Yes');
        backendFramework.tagName.add(option1);
        backendFramework.tagName.add(option2);

        backendFrameworkType = new makeInput('select',
        id = 'backend_framework_type',
        innerText = 'Which type of backend framework?',
        placeholder = null,
        );
        
        option1 = new Option('Laravel', 'Laravel');
        option1.select = 1;
        option2 = new Option('CakePHP', 'CakePHP');
        option3 = new Option('Ruby on Rails', 'Ruby on Rails');
        option4 = new Option('Django', 'Django');
        option5 = new Option('Flask', 'Flask');
        backendFrameworkType.tagName.add(option1);
        backendFrameworkType.tagName.add(option2);
        backendFrameworkType.tagName.add(option3);
        backendFrameworkType.tagName.add(option4);
        backendFrameworkType.tagName.add(option5);

        
        frontendFramework = new makeInput('select',
        id = 'frontend_framework',
        innerText = 'Does your site utilize a frontend framework?',
        placeholder = null,
        );

        option1 = new Option('No', 'No');
        option1.select = 1;
        option2 = new Option('Yes', 'Yes');
        frontendFramework.tagName.add(option1);
        frontendFramework.tagName.add(option2);

        frontendFrameworkType = new makeInput('select',
        id = 'frontend_framework_type',
        innerText = 'Which type of frontend framework?',
        placeholder = null,
        );
        
        option1 = new Option('React', 'React');
        option1.select = 1;
        option2 = new Option('Angular', 'Angular');
        option3 = new Option('Vue', 'Vue');
        option4 = new Option('Ember', 'Ember');
        frontendFrameworkType.tagName.add(option1);
        frontendFrameworkType.tagName.add(option2);
        frontendFrameworkType.tagName.add(option3);
        frontendFrameworkType.tagName.add(option4);

        isPlatform = new makeInput('select',
        id = 'is_platform',
        innerText = 'Was your site created using a site-builder?',
        placeholder = null,
        );

        option1 = new Option('No', 'No');
        option1.select = 1;
        option2 = new Option('Yes', 'Yes');
        isPlatform.tagName.add(option1);
        isPlatform.tagName.add(option2);
        
        platformType = new makeInput('select',
        id = 'platform_type',
        innerText = 'What type of site-builder did you use?',
        placeholder = null,
        );
            
        option1 = new Option('WordPress', 'WordPress');
        option1.select = 1;
        option2 = new Option('SiteBuilder', 'SiteBuilder');
        option3 = new Option('Wix', 'Wix');
        option4 = new Option('Squarespace', 'Squarespace');
        option5 = new Option('Freewebs', 'Freewebs');
        option6 = new Option('Shopify', 'Shopify');
        option7 = new Option('Weebly', 'Weebly');

        platformType.tagName.add(option1);
        platformType.tagName.add(option2);
        platformType.tagName.add(option3);
        platformType.tagName.add(option4);
        platformType.tagName.add(option5);
        platformType.tagName.add(option6);
        platformType.tagName.add(option7);

// create Security Analysis dropdown options

    dbType = new makeInput('select',
    id = 'db_type',
    innerText = 'What kind of database do you have?',
    placeholder = null,
    );

    option1 = new Option('Oracle', 'Oracle');
    option2 = new Option('MySQL', 'MySQL');
    option3 = new Option('Microsoft SQL Server', 'Microsoft SQL Server');
    option4 = new Option('PostgreSQL', 'PostgreSQL');
    option5 = new Option('MongoDB', 'MongoDB');
    option6 = new Option('DB2', 'DB2');
    option7 = new Option('Microsoft Access', 'Microsoft Access');
    option8 = new Option('Cassandra', 'Cassandra');
    option9 = new Option('Redis', 'Redis');
    option10 = new Option('Elasticsearch', 'Elasticsearch');
    dbType.tagName.add(option1);
    dbType.tagName.add(option2);
    dbType.tagName.add(option3);
    dbType.tagName.add(option4);
    dbType.tagName.add(option5);
    dbType.tagName.add(option6);
    dbType.tagName.add(option7);
    dbType.tagName.add(option8);
    dbType.tagName.add(option9);
    dbType.tagName.add(option10);    

    testScope = new makeInput('select',
    id = 'test_scope',
    innerText = 'How thoroughly do you want us to test?',
    placeholder = null,
    );
    
    option1 = new Option('I have a specific test-case');
    option2 = new Option('Full-service vulnerability testing')
    testScope.tagName.add(option1);
    testScope.tagName.add(option2);

    securityIncidents = new makeInput('select',
    id = 'data_breach',
    innerText = 'Have you had any data breaches in the past?',
    placeholder = null,
    );
    
    option1 = new Option('No');
    option2 = new Option('Yes');
    option2.selected = 1;
    securityIncidents.tagName.add(option1);
    securityIncidents.tagName.add(option2);

// create Custom Proposal dropdown options

// create Legacy Code Maintenance dropdown options

    legacyBackendType = new makeInput('select',
    id = 'legacy_backend_type',
    innerText = 'What legacy programming language is your project built on?',
    placeholder = null,
    );
        
    option1 = new Option('C');
    option2 = new Option('COBOL');
    option3 = new Option('BASIC');
    option4 = new Option('FORTRAN');
    legacyBackendType.tagName.add(option1);
    legacyBackendType.tagName.add(option2);
    legacyBackendType.tagName.add(option3);
    legacyBackendType.tagName.add(option4);

// create Mobile App dropdown options

    newOrExistingApp = new makeInput('select',
    id = 'new_or_existing_app',
    innerText = 'Is this a new or existing app?',
    placeholder = null,
    );

    option1 = new Option('New', 'New');
    option2 = new Option('Existing', 'Existing');
    newOrExistingApp.tagName.add(option1);
    newOrExistingApp.tagName.add(option2);

    appStore = new makeInput('select',
    id = 'app_store',
    innerText = 'Which app store are you targeting?',
    placeholder = null,
    );

    option1 = new Option('Google Android', 'Google Android');
    option2 = new Option('Apple iOS', 'Apple iOS');
    option3 = new Option('Both', 'Both');
    appStore.tagName.add(option1);
    appStore.tagName.add(option2);
    appStore.tagName.add(option3);
    
    formRow0 = new makeFormRow([govContract.tagName.parentNode.parentNode, existingSite.tagName.parentNode.parentNode, siteType.tagName.parentNode.parentNode]);
    formRow1 = new makeFormRow([whereHosted.tagName.parentNode.parentNode, siteURL.tagName.parentNode.parentNode, backendType.tagName.parentNode.parentNode]);
    formRow2 = new makeFormRow([backendFramework.tagName.parentNode.parentNode, frontendFramework.tagName.parentNode.parentNode, backendFrameworkType.tagName.parentNode.parentNode]);
    formRow3 = new makeFormRow([frontendFrameworkType.tagName.parentNode.parentNode, isPlatform.tagName.parentNode.parentNode, platformType.tagName.parentNode.parentNode]);
    formRow4 = new makeFormRow([dbType.tagName.parentNode.parentNode, testScope.tagName.parentNode.parentNode, securityIncidents.tagName.parentNode.parentNode]);
    formRow5 = new makeFormRow([legacyBackendType.tagName.parentNode.parentNode, newOrExistingApp.tagName.parentNode.parentNode, appStore.tagName.parentNode.parentNode]);
    

        var httpRequest = new XMLHttpRequest();
        var data = {'refId':refId.value};
            httpRequest.onloadend = function()
        {
            resp = JSON.parse(httpRequest.responseText);
            govContract.tagName.value = resp['gov_contract'];
            existingSite.tagName.value = resp['existing_site'];
            siteType.tagName.value = resp['site_type'];
            whereHosted.tagName.value = resp['where_hosted'];
            siteURL.tagName.value = resp['site_url'];
            backendType.tagName.value = resp['backend_type'];
            backendFramework.tagName.value = resp['backend_framework'];
            frontendFramework.tagName.value = resp['frontend_framework'];
            backendFrameworkType.tagName.value = resp['backend_framework_type'];
            frontendFrameworkType.tagName.value = resp['frontend_framework_type'];
            isPlatform.tagName.value = resp['is_platform'];
            platformType.tagName.value = resp['platform_type'];
            dbType.tagName.value = resp['db_type'];
            testScope.tagName.value = resp['test_scope'];
            securityIncidents.tagName.value = resp['security_incidents'];
            legacyBackendType.tagName.value = resp['legacy_backend_type'];
            newOrExistingApp.tagName.value = resp['new_or_existing_app'];
            appStore.tagName.value = resp['app_store'];
        }
    httpRequest.open('POST', '/clientapplication/data', true);
    httpRequest.setRequestHeader('Content-Type', 'application/json');
    httpRequest.setRequestHeader('X-CSRF-TOKEN', csrf.value);
    httpRequest.send(JSON.stringify(data));
}