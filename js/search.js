let inp = document.querySelector('#inp');
let list = document.querySelector('.accordion-flush').querySelectorAll('a');

function filter_list() {
  let re = new RegExp(inp.value, 'i');
  //document.querySelector('#btn').click();
  list.forEach((x) => {
      re.test(x.textContent);
      x.innerHTML = x.textContent.replace(re, '<b>$&</b>');
    //  document.getElementById(this).scrollIntoView();
  });
}
