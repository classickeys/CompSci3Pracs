function removeElementsByClass(className) {
    var elements = document.querySelectorAll('.' + className);
    elements.forEach(function(element) {
        element.remove();
    });
}