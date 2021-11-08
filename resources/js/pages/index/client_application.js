if(window.location.pathname == '/client_application')
{
    require('./custom')

    /* vars index

    existingSite - New or Existing site
    siteType - Personal or Commercial site
    govContract - Are you performing contract procurement for a United States government agency
    whereHosted - current hosting provider
    siteURL - current site URL
    backendType - what programming language is your project built on
    backendFramework - was your site built using a backend framework
    frontendFramework - was your site built using a frontend framework
    backendFrameworkType - what backend framework is your project built on
    frontendFrameworkType - what frontend framework is your project built on
    isPlatform - was your project built using a platform
    platformType - what platform was your project built on
    dbType - what type of database does your project utilize
    testScope - how thoroughly do you want us to test
    securityIncidents - have you had security breaches in the past
    legacyBackendType - what legacy programming language is your project built on
    newOrExistingApp - New or Existing app
    appStore - are you targeting Apple iOS, Google appstores, or both
    
    */

    existingSite.setDisplayState('block');
    siteType.setDisplayState('block');
    govContract.setDisplayState('block');
    domainName.setDisplayState('block');
    whereHosted.setDisplayState('none');
    siteURL.setDisplayState('none');
    backendType.setDisplayState('none');
    backendFramework.setDisplayState('none');
    frontendFramework.setDisplayState('none');
    backendFrameworkType.setDisplayState('none');
    frontendFrameworkType.setDisplayState('none');
    isPlatform.setDisplayState('none');
    platformType.setDisplayState('none');
    dbType.setDisplayState('none');
    testScope.setDisplayState('none');
    securityIncidents.setDisplayState('none');
    legacyBackendType.setDisplayState('none');
    newOrExistingApp.setDisplayState('none');
    appStore.setDisplayState('none');
   
    govContract.onchange = function()
    {
        if(govContract.tagName.value == 'No')
        {
            document.write('lol')
        }
    }
    projectType.onchange = function()
    {
        if(projectType.value == 'Web Design/Development')
        {
        existingSite.setDisplayState('block');
        siteType.setDisplayState('block');
        govContract.setDisplayState('block');
        domainName.setDisplayState('none');
        whereHosted.setDisplayState('none');
        siteURL.setDisplayState('none');
        backendType.setDisplayState('none');
        backendFramework.setDisplayState('none');
        frontendFramework.setDisplayState('none');
        backendFrameworkType.setDisplayState('none');
        frontendFrameworkType.setDisplayState('none');
        isPlatform.setDisplayState('none');
        platformType.setDisplayState('none');
        dbType.setDisplayState('none');
        testScope.setDisplayState('none');
        securityIncidents.setDisplayState('none');
        legacyBackendType.setDisplayState('none');
        newOrExistingApp.setDisplayState('none');
        appStore.setDisplayState('none');
        }
        if(projectType.value == 'DevOps Management')
        {
        existingSite.setDisplayState('none');
        siteType.setDisplayState('none');
        govContract.setDisplayState('block');
        domainName.setDisplayState('none');
        whereHosted.setDisplayState('block');
        siteURL.setDisplayState('block');
        backendType.setDisplayState('block');
        backendFramework.setDisplayState('block');
        frontendFramework.setDisplayState('block');
        backendFrameworkType.setDisplayState('none');
        frontendFrameworkType.setDisplayState('none');
        isPlatform.setDisplayState('block');
        platformType.setDisplayState('none');
        dbType.setDisplayState('block');
        testScope.setDisplayState('none');
        securityIncidents.setDisplayState('none');
        legacyBackendType.setDisplayState('none');
        newOrExistingApp.setDisplayState('none');
        appStore.setDisplayState('none');
        }
        if(projectType.value == 'Mobile App')
        {
        existingSite.setDisplayState('none');
        siteType.setDisplayState('none');
        govContract.setDisplayState('block');
        domainName.setDisplayState('none');
        whereHosted.setDisplayState('none');
        siteURL.setDisplayState('none');
        backendType.setDisplayState('none');
        backendFramework.setDisplayState('none');
        frontendFramework.setDisplayState('none');
        backendFrameworkType.setDisplayState('none');
        frontendFrameworkType.setDisplayState('none');
        isPlatform.setDisplayState('none');
        platformType.setDisplayState('none');
        dbType.setDisplayState('none');
        testScope.setDisplayState('none');
        securityIncidents.setDisplayState('none');
        legacyBackendType.setDisplayState('none');
        newOrExistingApp.setDisplayState('block');
        appStore.setDisplayState('block');
        }
        if(projectType.value == 'Security Analysis')
        {
        existingSite.setDisplayState('none');
        siteType.setDisplayState('none');
        govContract.setDisplayState('block');
        domainName.setDisplayState('none');
        whereHosted.setDisplayState('block');
        siteURL.setDisplayState('block');
        backendType.setDisplayState('block');
        backendFramework.setDisplayState('block');
        frontendFramework.setDisplayState('none');
        backendFrameworkType.setDisplayState('none');
        frontendFrameworkType.setDisplayState('none');
        isPlatform.setDisplayState('block');
        platformType.setDisplayState('none');
        dbType.setDisplayState('block');
        testScope.setDisplayState('block');
        securityIncidents.setDisplayState('block');
        legacyBackendType.setDisplayState('none');
        newOrExistingApp.setDisplayState('none');
        appStore.setDisplayState('none');
        }
        if(projectType.value == 'Custom Proposal')
        {
        existingSite.setDisplayState('none');
        siteType.setDisplayState('none');
        govContract.setDisplayState('block');
        domainName.setDisplayState('none');
        whereHosted.setDisplayState('none');
        siteURL.setDisplayState('none');
        backendType.setDisplayState('none');
        backendFramework.setDisplayState('none');
        frontendFramework.setDisplayState('none');
        backendFrameworkType.setDisplayState('none');
        frontendFrameworkType.setDisplayState('none');
        isPlatform.setDisplayState('none');
        platformType.setDisplayState('none');
        dbType.setDisplayState('none');
        testScope.setDisplayState('none');
        securityIncidents.setDisplayState('none');
        legacyBackendType.setDisplayState('none');
        newOrExistingApp.setDisplayState('none');
        appStore.setDisplayState('none');
        }
        if(projectType.value == 'Legacy Code Maintenance')
        {
        existingSite.setDisplayState('none');
        siteType.setDisplayState('none');
        govContract.setDisplayState('block');
        domainName.setDisplayState('none');
        whereHosted.setDisplayState('none');
        siteURL.setDisplayState('none');
        backendType.setDisplayState('none');
        backendFramework.setDisplayState('none');
        frontendFramework.setDisplayState('none');
        backendFrameworkType.setDisplayState('none');
        frontendFrameworkType.setDisplayState('none');
        isPlatform.setDisplayState('none');
        platformType.setDisplayState('none');
        dbType.setDisplayState('block');
        testScope.setDisplayState('none');
        securityIncidents.setDisplayState('none');
        legacyBackendType.setDisplayState('block');
        newOrExistingApp.setDisplayState('none');
        appStore.setDisplayState('none');
        }        
    }

    existingSite.tagName.onchange = function()
    {
        if(existingSite.tagName.value == 'New')
        {
            whereHosted.setDisplayState('none');
            siteURL.setDisplayState('none');
            backendType.setDisplayState('none');
            domainName.setDisplayState('block');
            backendFramework.setDisplayState('none');
            frontendFramework.setDisplayState('none');
            backendFrameworkType.setDisplayState('none');
            frontendFrameworkType.setDisplayState('none');
            isPlatform.setDisplayState('none');
            platformType.setDisplayState('none');
        }
        if(existingSite.tagName.value == 'Existing')
        {
            whereHosted.setDisplayState('block');
            siteURL.setDisplayState('block');
            backendType.setDisplayState('block');
            domainName.setDisplayState('none');
            backendFramework.setDisplayState('block');
            frontendFramework.setDisplayState('block');
            backendFrameworkType.setDisplayState('none');
            frontendFrameworkType.setDisplayState('none');
            isPlatform.setDisplayState('block');
            platformType.setDisplayState('none');
        }
    }

    backendFramework.tagName.onchange = function()
    {
        if(backendFramework.tagName.value == 'Yes')
        {
            backendFrameworkType.setDisplayState('block');
        }
        if(backendFramework.tagName.value == 'No')
        {
            backendFrameworkType.setDisplayState('none');
        }
    }

    frontendFramework.tagName.onchange = function()
    {
        if(frontendFramework.tagName.value =='Yes')
        {
            frontendFrameworkType.setDisplayState('block');
        }
        if(frontendFramework.tagName.value == 'No')
        {
            frontendFrameworkType.setDisplayState('none');
        }
    }

    isPlatform.tagName.onchange = function()
    {
        if(isPlatform.tagName.value =='Yes')
        {
            platformType.setDisplayState('block');
        }
        if(isPlatform.tagName.value == 'No')
        {
            platformType.setDisplayState('none');
        }
    }
}