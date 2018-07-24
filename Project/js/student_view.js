let items = [];
console.log(tempData);
// $.getJSON(tempData, (data) => {
//         $.each(data, (key, val) => {
//                 items.push(val)
//                 console.log(items)
//                 console.log('tst')
//             })
for (let i = 0; i < tempData.length; i++) {
    $(`.ticket-container:eq(${0})`).append(`
    <div class="row">
            <div class="ticket-box col-lg-6 col-md-6 col-sm-9 col-9 offset-lg-3 offset-md-3">
                <div class="green-label"></div>
                <div class="orange-label"></div>
                <p class="ticket-date">Posted 45 minutes ago.</p>
                <p class="ticket-title"><strong>Title: </strong>${tempData[i].title}</p>
                <p class="ticket-topic">${tempData[i].name}</p>
                <button class="expand-ticket"><i class="fas fa-angle-double-down down"></i></button>
                <div class="panel">
                    <p><strong>Description: </strong><br>${tempData[i].description}</p>
                </div>
            </div>
            <div class="ticket-author col-lg-1 col-md-1 col-sm-1 col-1">
                <div class="avatar text-center ml-auto mr-auto"></div>
                <p class="text-center">${tempData[i].student}</p>
            </div>
        </div>
    `)
}

var accordions = document.querySelectorAll("button.expand-ticket");
for (var i = 0; i < accordions.length; i++) {
accordions[i].onclick = function() {
    this.nextElementSibling.classList.toggle("show");
    $(this).toggleClass("rotate-button");
};
}
// })

