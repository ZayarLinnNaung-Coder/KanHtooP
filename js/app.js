let letter = document.getElementById("letter");
let num_one = document.getElementById("num_one");
let num_two = document.getElementById("num_two");
let num_three = document.getElementById("num_three");
let num_four = document.getElementById("num_four");
let num_five = document.getElementById("num_five");
let num_six = document.getElementById("num_six");

let letterArr = ['က','ခ','ဂ‌','ဃ','င','စ','ဆ','ဇ','ဈ','ည','ဋ','ဌ','ဍ','','ဏ','တ','ထ','ဒ','ဓ','န','ပ','ဖ','ဗ','ဘ','မ','ယ','ရ','လ','၀','သ','ဟ','ဠ','အ','ကက','ကခ','ကဂ‌','ကဃ','ကင','ကစ','ကဆ','ကဇ','ကဈ','ကည','ကဋ','ကဌ','ကဍ','','ကဏ','ကတ','ကထ','ကဒ','ကဓ','ကန','ကပ','ကဖ','ကဗ','ကဘ','ကမ','ကယ','ကရ','ကလ','က၀','ကသ','ကဟ','ကဠ','ကအ'];
let numberArr = ['၀','၁','၂','၃','၄','၅','၆','၇','၈','၉'];



function appendOption(arr,slt){
    arr.map(function (e) {
        slt.innerHTML += `<option>${e}</option>`;
    })
}

appendOption(letterArr,letter);
appendOption(numberArr,num_one);
appendOption(numberArr,num_two);
appendOption(numberArr,num_three);
appendOption(numberArr,num_four);
appendOption(numberArr,num_five);
appendOption(numberArr,num_six);