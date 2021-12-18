function scrollDown() {
    const scale = Tools.getScale();
    const x = 0;
    let result = [];
    Tools.drawingArea.childNodes.forEach(function(item){
        result.push(item.getBoundingClientRect().top + window.scrollY - 30);
    });
    const y = (Math.max.apply(null, result)) / scale;
    const hash = '#' + (x | 0) + ',' + (y | 0) + ',' + scale.toFixed(1);
    localStorage.setItem('board-coords', hash);
    window.scrollTo({left: x * scale, top: y * scale, behavior: "smooth"});
}
