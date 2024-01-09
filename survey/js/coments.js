document.getElementById('comment-form') ;{
    e.preventDefault();
  
    var nameInput = document.getElementById('name');
    var messageInput = document.getElementById('message');
  
    var name = nameInput.value;
    var message = messageInput.value;
  
    if (name.trim() === '' || message.trim() === '') {
      alert('Please enter your name and comment');
      return;
    }
  
    var commentDiv = document.createElement('div');
    commentDiv.className = 'comment';
    commentDiv.innerHTML = '<h4>' + name + '</h4><p>' + message + '</p>';
  
    document.getElementById('comments').appendChild(commentDiv);
  
    nameInput.value = '';
    messageInput.value = '';
  };
  