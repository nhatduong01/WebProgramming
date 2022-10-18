// Question 1a
function findMaximum(listNums) {
  let maxNum = Number.NEGATIVE_INFINITY;
  for (let i = 0; i < listNums.length; i++) {
    if (listNums[i] > maxNum) {
      maxNum = listNums[i];
    }
  }
  return maxNum;
}

function findMiminum(listNums) {
  let minNum = Number.POSITIVE_INFINITY;
  for (let i = 0; i < listNums.length; i++) {
    if (listNums[i] < minNum) {
      minNum = listNums[i];
    }
  }
  return minNum;
}
// Question 1b
function sortAscending(listNums) {
  for (let i = 0; i < listNums.length; i++) {
    for (let j = 0; j < listNums.length - 1; j++) {
      // Swap two numbers
      if (listNums[j] > listNums[j + 1]) {
        let temp = listNums[j];
        listNums[j] = listNums[j + 1];
        listNums[j + 1] = temp;
      }
    }
  }
  return listNums;
}

function sortDescending(listNums) {
  for (let i = 0; i < listNums.length; i++) {
    for (let j = 0; j < listNums.length - 1; j++) {
      // Swap two numbers
      if (listNums[j] < listNums[j + 1]) {
        let temp = listNums[j];
        listNums[j] = listNums[j + 1];
        listNums[j + 1] = temp;
      }
    }
  }
  return listNums;
}
window.onload = () => {
  let myArray = [1, 2, -5, 6, 10, 7, 20, 25, 15];
  let h1 = document.createElement("h1");
  h1.innerHTML = "This is exercise 2";
  document.body.appendChild(h1);
  let h2 = document.createElement("h3");
  h2.innerText = `The input array is: ${myArray}`;
  document.body.append(h2);
  h2 = document.createElement("h3");
  h2.innerHTML = `The maximum number is: ${findMaximum(myArray)}`;
  document.body.append(h2);
  h2 = document.createElement("h3");
  h2.innerHTML = `The minimum number is: ${findMiminum(myArray)}`;
  document.body.append(h2);
  h2 = document.createElement("h3");
  h2.innerHTML = `The ascending sort order is: ${sortAscending(myArray)}`;
  document.body.append(h2);
  h2 = document.createElement("h3");
  h2.innerHTML = `The descending sort order is: ${sortDescending(myArray)}`;
  document.body.append(h2);
};

console.log(sortAscending([1, 2, -5, 6, 10, 7, 20, 25, 15]));
console.log(sortDescending([1, 2, -5, 6, 10, 7, 20, 25, 15]));
console.log(findMaximum([1, 2, -5, 6, 10, 7, 20, 25, 15]));
console.log(findMiminum([1, 2, -5, 6, 10, 7, 20, 25, 15]));
