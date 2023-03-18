var popwin = null;

function popupScrollbars(url, name, width, height) {
    name = name.replace(/ /g, "");
    name = name.replace(/./g, "");
    popwin = window.open(url, name, "toolbar=no,scrollbars=yes,menubar=no,resizable=yes,status=no,width=" + width + ",height=" + height + ",dependent=yes");
    popwin.focus();
}