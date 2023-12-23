/*
 ---Table of Contents Js ------
 --- TechinDetail.com ------
*/

function toc(selectorType,articleSelector, headingSelector) {
  window.addEventListener("DOMContentLoaded", (event) => {

    let headings;

    if (selectorType == 'id') {
      const article = document.getElementById(articleSelector);
      headings = article.querySelectorAll(headingSelector);

    } else {
      article = document.getElementsByClassName(articleSelector)[0];
      headings = article.querySelectorAll(headingSelector);
    }

    const toc = document.getElementById("toc");
    const totalHeadings = headings.length;

    let tocOl = document.createElement("ol");
    let tocFragment = new DocumentFragment();
    let mainLi = null;
    let subUl = null;
    let subLi = null;
    let isSibling = false;

    let h2Index = 0;
    let h3Index = 1;

    if (totalHeadings > 1) {
      for (let element of headings) {
        let anchor = document.createElement("a");
        let anchorText = element.textContent;
        anchor.innerText = anchorText;
        //let elementId = anchorText.replaceAll(" ", "-").toLowerCase();
        let level = element.nodeName;

        let elementId;

        if ("H2" === level) {
          h2Index++;
          elementId = "toc-" + h2Index;
          h3Index = 1;
        }
        if ("H3" === level) {
        elementId = "toc-" + h2Index + "-" + h3Index++;
        }

        element.id = elementId;

        anchor.href = window.location.pathname + "#" + elementId;

        if ("H3" === level) {
          if (mainLi) {
            subLi = document.createElement("li");
            subLi.appendChild(anchor);

            if (isSibling === false) {
              subUl = document.createElement("ul");
            }
            subUl.appendChild(subLi);
            mainLi.appendChild(subUl);

            isSibling = true;
          }
        } else {
          mainLi = document.createElement("li");
          mainLi.appendChild(anchor);
          tocFragment.appendChild(mainLi);
          isSibling = false;
          subUl = null;
        }
      }
      tocOl.append(tocFragment);
      toc.append(tocOl);
    } else {
      toc.style.display = "none";
    }
  })
}
