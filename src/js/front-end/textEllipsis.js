//Text overflow ellipsis
const ellipsisText = (e) => {
    const wordArray = e.innerHTML.split(" ");
    while (e.scrollHeight > e.offsetHeight) {
      wordArray.pop();
      e.innerHTML = wordArray.join(" ") + ("...");
    }
  };
  const content = document.querySelectorAll(".columns>.column>.card>.card-content>.content");
  const ellipsisText = (e) => {
    const wordArray = e.innerHTML.split(" ");
    while (e.scrollHeight > e.offsetHeight) {
      wordArray.pop();
      e.innerHTML = wordArray.join(" ") + ("...");
    }
  };
  window.addEventListener('resize', () => {
  [...content].forEach((e)=>{
    ellipsisText(e);
  
  });
  });