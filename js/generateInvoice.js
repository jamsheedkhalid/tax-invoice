function generateInvoice(data) {
    var book, bus, tuition, uniform, installment_1, installment_2, installment_3 = 0;
    document.getElementById('student_id').innerText = data[0];
    document.getElementById('student_name').innerText = data[1];
    document.getElementById('parent_name').innerHTML = ": " + data[2];
    document.getElementById('parent_id').innerHTML = ": " + data[3];
    document.getElementById('parent_tel').innerHTML = ": " + data[4];
    document.getElementById('invoice_date').innerText = ": " + data[5];
    document.getElementById('student_grade').innerText = data[6] + " - " + data[7];
    // document.getElementById('student_grade').innerText = data[6];

    switch (data[6]) {
        case ' KG1 ':
        case ' KG2 ':
            book = 840;
            uniform = 90;
            bus = 3500;
            tuition = 5570 + 4500 + 3200;
            installment_1 = 5570;
            installment_2 = 4500;
            installment_3 = 3200;
            break;

        case 'GR 1':
        case 'GR 2':
        case 'GR 3':
            book = 1320;
            uniform = 100;
            bus = 3500;
            installment_1 = 6080;
            installment_2 = 5500;
            installment_3 = 3650;
            tuition = installment_3 + installment_2 + installment_1;
            break;

        case 'GR 4':
            book = 1320;
            uniform = 100;
            bus = 3500;
            installment_1 = 6080;
            installment_2 = 6500;
            installment_3 = 5530;
            tuition = installment_3 + installment_2 + installment_1;
            break;
        case 'GR 5':
        case 'GR 6':
            book = 1680;
            uniform = 100;
            bus = 3500;
            installment_1 = 6720;
            installment_2 = 7000;
            installment_3 = 4390;
            tuition = installment_3 + installment_2 + installment_1;
            break;

        case 'GR 7':
        case 'GR 8':
            book = 1680;
            uniform = 100;
            bus = 3500;
            installment_1 = 6720;
            installment_2 = 8000;
            installment_3 = 8120;
            tuition = installment_3 + installment_2 + installment_1;
            break;
        case 'GR 9':
            book = 1920;
            uniform = 100;
            bus = 3500;
            installment_1 = 7480;
            installment_2 = 9500;
            installment_3 = 11210;
            tuition = installment_3 + installment_2 + installment_1;
            break;

        case 'GR10':
            book = 1200;
            uniform = 100;
            bus = 3500;
            installment_1 = 8200;
            installment_2 = 9500;
            installment_3 = 10490;
            tuition = installment_3 + installment_2 + installment_1;
            break;

        case 'GR11':
            book = 2760;
            uniform = 100;
            bus = 3500;
            installment_1 = 6640;
            installment_2 = 11500;
            installment_3 = 10050;
            tuition = installment_3 + installment_2 + installment_1;
            break;

        case 'GR12':
            book = 1800;
            uniform = 100;
            bus = 3500;
            installment_1 = 7600;
            installment_2 = 11000;
            installment_3 = 9590;
            tuition = installment_3 + installment_2 + installment_1;
            break;

    }
    document.getElementById('book_fee').innerHTML = book;
    document.getElementById('uniform_fee').innerHTML = uniform;
    document.getElementById('transportation_fee').innerHTML = bus;
    document.getElementById('tuition_fee').innerHTML = tuition;
    document.getElementById('f_installment').innerHTML = "1st installment : " + installment_1;
    document.getElementById('s_installment').innerHTML = "2nd installment : " + installment_2;
    document.getElementById('t_installment').innerHTML = "3rd installment : " + installment_3;
    document.getElementById('uniform_vat').innerHTML = ((5 / 100) * uniform).toString();
    document.getElementById('uniform_total').innerHTML = uniform + (5 / 100) * uniform
    document.getElementById('book_total').innerHTML = book;
    document.getElementById('tuition_total').innerHTML = tuition;
    document.getElementById('transportation_total').innerHTML = bus;
    document.getElementById('total').innerHTML =
        parseInt(document.getElementById('uniform_total').textContent) +
        parseInt(document.getElementById('book_total').textContent) +
        parseInt(document.getElementById('tuition_total').textContent) +
        parseInt(document.getElementById('transportation_total').textContent);
    document.getElementById('vat_total').innerHTML = (5 / 100) * uniform;
    document.getElementById('net_total').innerHTML =
        parseInt(document.getElementById('total').textContent) +
        parseInt(document.getElementById('vat_total').textContent);


}
