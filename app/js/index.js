/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
var app = {
    // Application Constructor
    initialize: function() {
        this.bindEvents();
    },
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicitly call 'app.receivedEvent(...);'
    onDeviceReady: function() {

    

    window.plugins.PushbotsPlugin.initialize("572672d34a9efaa64e8b4569", {"android":{"sender_id":"467151967847"}});
    //alert(1);

    
    window.plugins.PushbotsPlugin.on("notification:received", function(data){
    var dados =  JSON.stringify(data);
    
    var obj = JSON.parse(dados);
    //alert(obj.url);
    
   
 


    });

     window.plugins.PushbotsPlugin.getRegistrationId(function(token){
        //localStorage.tokken = token;
        localStorage.setItem('tokken', token);
     });



// Should be called once the notification is clicked
    window.plugins.PushbotsPlugin.on("notification:clicked", function(data){
    var dados =  JSON.stringify(data);
    var obj = JSON.parse(dados);
    //alert(obj.url);
    if(obj.idnotificacao != null){
    window.location='notificacaopush.html?id='+obj.idnotificacao;
    }
    //location.href=obj.url;
    });
   


    app.receivedEvent('deviceready');
    },
    // Update DOM on a Received Event
    receivedEvent: function(id) {
        var parentElement = document.getElementById(id);
        var listeningElement = parentElement.querySelector('.listening');
        var receivedElement = parentElement.querySelector('.received');

        listeningElement.setAttribute('style', 'display:none;');
        receivedElement.setAttribute('style', 'display:block;');

        console.log('Received Event: ' + id);
    }

    
};

app.initialize();