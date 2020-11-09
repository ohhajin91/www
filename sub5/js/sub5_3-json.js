

let xhr = new XMLHttpRequest();              
xhr.onload = function() {                       
    responseObject = JSON.parse(xhr.responseText);  

    let newContent = '';
    
    newContent += '<ul>';
    

    for (let i = 0; i < responseObject.story.length; i++) { 
      newContent += '<li>';
      newContent += '<figure>';
      newContent += '<a href="javascript:void(0);"><img src="' + responseObject.story[i].fic + '" alt=""></a>';
      newContent += '<figcaption>';
      newContent += '<dl>' ; 
      newContent += '<dt>' + responseObject.story[i].main1 + '<br>';
      newContent +=  responseObject.story[i].main2 + '</dt>';
      newContent += '<dd>' + responseObject.story[i].sub + '</dd>';
      newContent += '</dl>';
      newContent += '</figcaption>';
      newContent += '</figure>';
      newContent += '</li>';
    }
      newContent += '</ul>';
 
    document.getElementById('new').innerHTML = newContent;

}


xhr.open('GET', 'js/sub5_3.json', true);        
xhr.send(null);                                 

