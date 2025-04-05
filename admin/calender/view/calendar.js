let calendar = document.querySelector('.calendar')

const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

isLeapYear = (year) => {
    return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 ===0)
}

getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28
}

generateCalendar = (month, year) => {

    let calendar_days = calendar.querySelector('.calendar-days')
    let calendar_header_year = calendar.querySelector('#year')

    let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

    calendar_days.innerHTML = ''

    let currDate = new Date()
    if (month > 11 || month < 0) month = currDate.getMonth()
    if (!year) year = currDate.getFullYear()

    let curr_month = `${month_names[month]}`
    month_picker.innerHTML = curr_month
    calendar_header_year.innerHTML = year
    
    let first_day = new Date(year, month, 1)

    for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
        let day = document.createElement('div')
        if (i >= first_day.getDay()) {
            day.classList.add('calendar-day-hover')
            let edate= `${month}/${i - first_day.getDay() + 1}`
            day.setAttribute('data-value',`${month}/${i - first_day.getDay() + 1}`)
            day.setAttribute('onclick',`eventdate(this.dataset.value)`)
            day.setAttribute('id',`calendar-day-hover`)
            $.post("calendar.php",{date:edate,op:'check'},function(data){
                if(data=='1'){
                    day.classList.add('event-date')
                }
            });
            day.innerHTML =i - first_day.getDay() + 1
            if (i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month === currDate.getMonth()) {
                day.classList.add('curr-date')
            }
        }
        calendar_days.appendChild(day)
    }

    
}

let month_list = calendar.querySelector('.month-list')

month_names.forEach((e, index) => {
    let month = document.createElement('div')
    month.innerHTML = `<div data-month="${index}">${e}</div>`
    month.querySelector('div').onclick = () => {
        month_list.classList.remove('show')
        curr_month.value = index
        generateCalendar(index, curr_year.value)
    }
    month_list.appendChild(month)
})

let month_picker = calendar.querySelector('#month-picker')

month_picker.onclick = () => {
    month_list.classList.add('show')
}

let currDate = new Date()

let curr_month = {value: currDate.getMonth()}
let curr_year = {value: currDate.getFullYear()}

generateCalendar(curr_month.value, curr_year.value)

document.querySelector('#prev-month').onclick = () => {
    --curr_month.value
    generateCalendar(curr_month.value, curr_year.value)
}

document.querySelector('#next-month').onclick = () => {
    ++curr_month.value
    generateCalendar(curr_month.value, curr_year.value)
}

document.querySelector('#prev-year').onclick = () => {
    --curr_year.value
    generateCalendar(curr_month.value, curr_year.value)
}

document.querySelector('#next-year').onclick = () => {
    ++curr_year.value
    generateCalendar(curr_month.value, curr_year.value)
}

let year_list=[];

let curryear=currDate.getFullYear();

for(let i=1980;i<=curryear;i++){
    year_list.push(i);
}

let year_picker=document.querySelector('#year')

let yearlist=document.querySelector('.year-list')

year_list.forEach((e,index)=>{
    let y=document.createElement('div')
    y.innerHTML = `<div data-year="${e}">${e}</div>`
    y.querySelector('div').onclick = () => {
        yearlist.classList.remove('show')
        curr_year.value = e
        generateCalendar(curr_month.value, e)
    }
    yearlist.appendChild(y)
})

year_picker.onclick=()=>{
    yearlist.classList.add('show')
}