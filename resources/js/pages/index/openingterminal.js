var cookie = require('cookie');

if (cookie.parse(document.cookie).cookieconsent != 'y') {
    var authAccepted = document.createElement('p')
    authAccepted.style.color = 'green'
    authAccepted.id = 'authAccepted'
    authAccepted.innerText = "AUTHORIZATION GRANTED"
    authAccepted.style.fontWeight = 'bold'
    authAccepted.style.fontSize = '4em'
    authAccepted.style.textDecoration = 'underline'
    authAccepted.style.marginTop = '10%'
    authAccepted.style.wordWrap = 'normal'
    authAccepted.style.display = 'none'

    var scanLine = document.createElement('div')
    scanLine.id = 'scanLine'
    scanLine.style.width = 100 + '%'
    scanLine.style.height = 1 + 'px'
    var marginBottom = 0
    scanLine.style.bottom = marginBottom + '%'
    scanLine.style.opacity = .3
    scanLine.style.backgroundColor = 'red'

    var privacyPolicy = document.createElement('div')
    privacyPolicy.id = 'privacyPolicy'
    privacyPolicy.style.display = 'none'
    privacyPolicy.style.textAlign = 'center'
    privacyPolicy.style.border = '1px solid orange'
    privacyPolicy.style.width = 90 + '%'
    privacyPolicy.style.height = 10 + '%'
    privacyPolicy.style.overflow = 'hidden'
    privacyPolicy.style.padding = 4 + '%'
    privacyPolicy.style.marginLeft = 5 + '%'
    privacyPolicy.style.marginRight = 5 + '%'
    policyRoller = document.createElement('p')
    policyRoller.id = 'policyRoller'
    policyRoller.innerText = 'View Policy'
    policyRoller.style.color = 'orange'
    policyRoller.style.fontWeight = 'bold'
    policyRoller.style.textDecoration = 'underline'


    var privacyPolicyElement = document.createElement('p')
    privacyPolicyElement.style.color = 'orange'
    privacyPolicyElement.style.fontWeight = 'bold'

    var policyAccept = document.createElement('p')
    policyAccept.id = 'policyAccept'
    policyAccept.innerText = 'Accept Policy'
    policyAccept.style.color = 'orange'
    policyAccept.style.fontWeight = 'bold'
    policyAccept.style.textDecoration = 'underline'

    var policyDecline = document.createElement('p')
    policyDecline.id = 'policyDecline'
    policyDecline.innerText = 'Decline Policy'
    policyDecline.style.color = 'orange'
    policyDecline.style.fontWeight = 'bold'
    policyDecline.style.textDecoration = 'underline'

    var lightBox = document.createElement('div');
    lightBox.id = 'lightBox';
    lightBox.style.backgroundColor = 'black';
    lightBox.style.backgroundImage = "url('../images/btlogo.gif')";
    lightBox.style.backgroundRepeat = 'no-repeat';
    lightBox.style.backgroundPosition = 'center';
    lightBox.style.backgroundSize = '70%';
    lightBox.style.zIndex = 100;
    lightBox.style.opacity = 1;
    lightBox.style.position = 'fixed';
    lightBox.style.minWidth = 100 + '%';
    lightBox.style.minHeight = 100 + '%';
    lightBox.style.top = 0
    lightBox.style.left = 0
    lightBox.style.right = 0
    lightBox.style.bottom = 0
    document.body.appendChild(lightBox);

    var terminal = document.createElement('div');
    terminal.id = 'terminal';
    terminal.style.backgroundColor = 'black';
    terminal.style.opacity = .9;
    terminal.style.zIndex = 101;
    terminal.style.textAlign = 'center'
    terminal.style.border = '1px solid orange'
    window.terminalWidth = 80;
    window.terminalHeight = 70;
    terminalWidth.id = 'terminalWidth'
    terminalHeight.id = 'terminalHeight'
    terminal.style.width = terminalWidth + '%';
    terminal.style.minHeight = terminalHeight + '%';
    terminal.style.overflow = 'hidden';
    terminal.style.position = 'absolute';
    terminal.style.display = 'block'
    terminal.style.marginLeft = 10 + '%'
    terminal.style.marginRight = 10 + '%'
    terminal.style.top = 20 + '%'



    app = document.getElementById('app');
    app.style.display = 'none';


    document.body.appendChild(terminal);

    var stars = document.createElement('p');
    stars.style.color = 'orange'
    stars.style.fontWeight = 'bold'

    var stars2 = document.createElement('p');
    stars2.style.color = 'orange'
    stars2.style.fontWeight = 'bold'

    var innerElement = document.createElement('div')

    var welcomeText = document.createElement('p')
    welcomeText.id = 'welcomeText'
    welcomeText.style.color = 'orange'
    welcomeText.innerText = 'BERTRAM TECHNOLOGIES CORPORATION'

    var warningText = document.createElement('p')
    warningText.id = 'warningText'
    warningText.style.color = 'red'
    warningText.style.textAlign = 'center'
    warningText.style.textDecoration = 'underline'
    warningText.innerText = 'WARNING: You are accessing a secure system. Access to this system is logged and monitored; access to, removal, alteration or transmission of secure information for which you do not have authorization constitutes a federal crime and may be subject to civil and criminal penalties, including fines and imprisonment'

    var heroText2 = document.createElement('p')
    heroText2.id = 'heroText2'
    heroText2.style.color = 'orange'
    heroText2.style.textAlign = 'center'
    heroText2.innerText = "In order to best serve you, our site uses cookies to enhance your browsing experience in accordance with our Privacy Policy at bertramtechnologies.com/privacy; you may also click [VIEW POLICY] near the bottom of this prompt to view our Privacy Policy. By continuing to use our site you consent to cookies usage under our Privacy Policy. Please click [ACCEPT POLICY] to accept. Further use of the site constitutes acceptance of this policy."

    var appendedText = document.createElement('span')
    appendedText.innerText = '|'
    appendedText.style.color = 'orange'
    appendedText.style.position = 'relative'

    var footer = document.createElement('p')
    footer.innerText = '©Copyright 2021 Bertram Technologies Corporation All Rights Reserved'
    footer.style.color = 'orange'

    terminal.appendChild(innerElement)
    terminal.appendChild(scanLine)
    innerElement.appendChild(welcomeText)
    innerElement.appendChild(stars)
    innerElement.appendChild(warningText)
    innerElement.appendChild(heroText2)
    heroText2.appendChild(appendedText)
    innerElement.appendChild(stars2)
    innerElement.appendChild(policyRoller)
    innerElement.appendChild(policyAccept)
    innerElement.appendChild(policyDecline)
    innerElement.appendChild(privacyPolicy)
    privacyPolicy.appendChild(privacyPolicyElement)
    innerElement.appendChild(footer)

    function scanLineScan() {
        scanLine.style.position = 'absolute'

        if (marginBottom <= 100) {
            marginBottom += 0.5
            scanLine.style.marginBottom = marginBottom + '%'
        }
        else if (marginBottom >= 100) {
            marginBottom = 0
        }
    }

    function starsAppear() {
        if (stars.innerText.length < 41) {
            stars.innerText += '*'
            stars2.innerText += '*'
        }
        else {
            clearInterval(intervalStarsAppear)
        }
    }

    function authorizationDisappear() {
        if (i > 0) {
            i -= 0.01
            authAccepted.style.opacity -= i + '%'
            console.log(i + ' disappeared')
        }
        else if (i <= 0) {
            clearInterval(intervalAuthorizationDisappear)
        }
    }

    function textBlink() {
        if (appendedText.style.opacity == 0) {
            appendedText.style.opacity = 1
        }
        else if (appendedText.style.opacity == 1) {
            appendedText.style.opacity = 0
        }
    }

    function hideTerminal() {
        terminal.style.minHeight = 0 + '%'
        terminal.style.height = (terminalHeight -= 1) + '%'
        terminal.style.opacity -= .01
        lightBox.style.opacity -= .01
        if (terminalHeight < 0) {
            terminal.style.display = 'none'
            lightBox.style.display = 'none'
        }
    }

    var intervalTextBlink = setInterval(textBlink, 500)
    var intervalStarsAppear = setInterval(starsAppear, 250)
    var intervalScanLineScan = setInterval(scanLineScan, 20)

    policyAccept.onclick = function () {
        app.style.display = 'block';
        innerElement.style.display = 'none'
        console.log(document.cookie = 'cookieconsent=y; max-age=31536000')
        authAccepted.appendChild(appendedText)
        appendedText.style.color = 'green'
        terminal.appendChild(authAccepted)
        authAccepted.style.display = 'block'
        //intervalAuthorizationDisappear = setInterval(function(){authorizationDisappear()}, 50,1)
        setTimeout(function () { intervalHideTerminal = setInterval(hideTerminal, 3) }, 750)
    }

    policyDecline.onclick = function () {
        innerElement.style.display = 'none'
        terminal.appendChild(authAccepted)
        authAccepted.style.display = 'block'
        authAccepted.style.wordWrap = 'break-word'
        authAccepted.innerText = 'AUTHORIZATION DENIED'
        authAccepted.style.opacity = 1
        authAccepted.style.color = 'red'
        appendedText.style.color = 'red'
        authAccepted.appendChild(appendedText)
    }

    var httpRequest = new XMLHttpRequest();
    httpRequest.onloadstart = function () {
        privacyPolicyElement.textContent = 'LOADING...'
    }
    httpRequest.onloadend = function () {
        setTimeout(() => {
            resp = JSON.parse(httpRequest.responseText)
            privacyPolicyElement.innerText = resp['privacyPolicy']
        }, 300)
    }

    let clicked = false
    policyRoller.onclick = function () {
        if (privacyPolicy.style.display == 'none') {
            privacyPolicy.style.display = 'block'
            policyRoller.innerText = 'Close Policy'
        }
        else if (privacyPolicy.style.display == 'block') {
            privacyPolicy.style.display = 'none'
            policyRoller.innerText = 'View Policy'
        }
        if (clicked == false) {
            httpRequest.open('GET', '/clientapplication/privacy', true);
            httpRequest.setRequestHeader('Content-Type', 'application/json');
            httpRequest.send();
            clicked = true
        }
    }
}