let fruits = {
    mevalar: ['olma', 'asal']
}


let is_shop_open = true;

let order = (time, work) => {

    return new Promise((resolve, reject) => {
        if (is_shop_open) {
            setTimeout(() => {
                resolve(work())

            }, time)
        } else {
            reject(console.log('Do\'kon yopiq'))
        }
    })
}

order(2000, () => console.log(fruits.mevalar[0]))
    .then(() => {
        return order(0000, () => console.log('then iwladi'))
    })
    .then(() => {
        return order(1000, () => console.log('then2 iwladi'))
    })
    //  agar is_open_shop false bo'lsa catch siz error beradi
    .catch(() => {
        is_shop_open = true;
        return order(1000, () => console.log("do'kon qayta iwga tuwdi"))

    })
    .finally( ()=> console.log('finnally  rejectda ham resolve da ham ishlaydi')
    )
