window.addEventListener('error', function(event) {
  const data = {
    'message': event.error.message,
    'file': event.error.fileName,
    'line': event.error.lineNumber,
    'url': window.location.href
  };
  window.jQuery.post( "/js-log", data, function(  ) {
    // console.log('log an error');
  });
})
