//Async function to fetch OS versions
async function fetchOSData() {
    const response = await fetch('RestAPI.php?action=osData');
    const osData = await response.json();
    return osData;
}

//Call function
fetchOSData()
    .then((osData) => {
        osBar(osData);
    });

//Async function to fetch computers assessed    
async function fetchComputers() {
    const response = await fetch('RestAPI.php?action=computers');
    const computers = await response.json();
    return computers;
}

//Call function
fetchComputers()
    .then((computers) => {
        computersBar(computers);
    });

//Async function to fetch devices assessed    
async function fetchDevices() {
    const response = await fetch('RestAPI.php?action=devices');
    const devices = await response.json();
    return devices;
}

//Call function
fetchDevices()
    .then((devices) => {
        devicesBar(devices);
    });

//Async function to fetch employees assessed    
async function fetchEmployees() {
    const response = await fetch('RestAPI.php?action=employees');
    const employees = await response.json();
    return employees;
}

//Call function
fetchEmployees()
    .then((employees) => {
        employeesBar(employees);
    });

//Async function to fetch OS license types    
async function fetchOSLicTypes() {
    const response = await fetch('RestAPI.php?action=oslictypes');
    const osLicTypes = await response.json();
    return osLicTypes;
}

//Call function
fetchOSLicTypes()
    .then((osLicTypes) => {
        osLicTypesBar(osLicTypes);
    });

//Async function to fetch antivirus data    
async function fetchAntivirus() {
    const response = await fetch('RestAPI.php?action=antivirus');
    const antivirus = await response.json();
    return antivirus;
}

//Call function
fetchAntivirus()
    .then((antivirus) => {
        antivirusBar(antivirus);
    });

//Async function to fetch computers per location data    
async function fetchComputersPerCountry() {
    const response = await fetch('RestAPI.php?action=computerspercountry');
    const computersPerCountry = await response.json();
    return computersPerCountry;
}

//Call function
fetchComputersPerCountry()
    .then((computersPerCountry) => {
        computersCountryBar(computersPerCountry);
    });

    //Async function to fetch users per location data    
async function fetchUsersPerCountry() {
    const response = await fetch('RestAPI.php?action=userspercountry');
    const usersPerCountry = await response.json();
    return usersPerCountry;
}

//Call function
fetchUsersPerCountry()
    .then((usersPerCountry) => {
        usersCountryBar(usersPerCountry);
    });

/**
 * Functions to create Dashboards
*/

function osBar(osData) {
    const home = osData.home;
    const pro = osData.pro;
    const ent = osData.ent;
    const mac = osData.mac;
    const others = osData.others;

    // Bar chart
    new Chart(document.getElementById("osVersions"), {
        type: 'bar',
        data: {
            labels: ["Windows 10 Home", "Windows 10 Pro", "Windows 10 Ent","MacOS", "Others"],
            datasets: [
                {
                    label: "# OS Versions",
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(255, 205, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'grey'],
                    data: [home, pro, ent, mac, others]
                },
            ]
        },
        options: {
            ticks: { stepSize: 1 },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'OPERATING SYSTEMS VERSIONS (ONLY EMPLOYEES)'
                }
            }
        }
    });

}



function computersBar(c) {
    myCompany = c.yes == null ? 0 : c.yes;
    contractors = c.no == null ? 0 : c.no;
    // Bar chart
    new Chart(document.getElementById("computers"), {
        type: 'pie',
        data: {
            labels: ["MyCompany", "Contractors"],
            datasets: [
                {
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                    ],
                    data: [myCompany, contractors]
                }
            ]
        },
        options: {
            ticks: { stepSize: 1 },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'TOTAL COMPUTERS'
                }
            }
        }
    });

}



function devicesBar(d) {
    myCompany = d.yes == null ? 0 : d.yes;
    contractors = d.no == null ? 0 : d.no;
    // Bar chart
    new Chart(document.getElementById("devices"), {
        type: 'pie',
        data: {
            labels: ["MyCompany", "Contractors"],
            datasets: [
                {
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(201, 203, 207, 0.8)'
                    ],
                    data: [myCompany, contractors]
                }
            ]
        },
        options: {
            ticks: { stepSize: 1 },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'TOTAL DEVICES'
                }
            }
        }
    });

}



function employeesBar(e) {
    activeEmployees = e.activeEmployees.count;
    activeContractors = e.activeContractors.count;
    inactiveEmployees = e.inactiveEmployees.count;
    inactiveContractors = e.inactiveContractors.count;

    // Bar chart
    new Chart(document.getElementById("employees"), {
        type: 'bar',
        data: {
            labels: ["MyCompany Users", "Contractors Users"],
            datasets: [
                {
                    label: "Active Users",
                    backgroundColor: "rgba(75, 192, 192, 0.8)",
                    data: [activeEmployees, activeContractors]
                },
                {
                    label: "Inactive Users",
                    backgroundColor: 'rgba(201, 203, 207, 0.8)',
                    data: [inactiveEmployees, inactiveContractors]
                }
            ]
        },
        options: {
            ticks: { stepSize: 1 },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'TOTAL USERS'
                }
            },
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true
                }
            }
        }
    });

}

function osLicTypesBar(e) {
    var oem = e.oem;
    var retail = e.retail;
    var volume = e.volume;

    // Bar chart
    new Chart(document.getElementById("osLicType"), {
        type: 'bar',
        data: {
            labels: ["OEM", "Volume", "Retail"],
            datasets: [
                {
                    label: "# OS License Types",
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                    data: [oem, volume, retail]
                }
            ]
        },
        options: {
            ticks: { stepSize: 1 },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'OPERATING SYSTEMS LICENSE TYPES (ONLY EMPLOYEES)'
                }
            }
        }
    });
}

function antivirusBar(av) {
    avNames = [];
    avCount = [];
    for (var i = 0; i < av.length; i++) {
        avNames[i] = av[i].swAvType;
        avCount[i] = av[i].count;
    }
    // Bar chart
    new Chart(document.getElementById("antivirus"), {
        type: 'doughnut',
        data: {
            labels: avNames,
            datasets: [
                {
                    label: "# antivirus",
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(150, 50, 180, 0.8)',
                        'rgba(5, 20, 100, 0.8)',
                        'rgba(86, 15, 45, 0.8)',
                    ],
                    data: avCount
                }
            ]
        },
        options: {
            ticks: { stepSize: 1 },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'ANTIVIRUS SOFTWARES (ONLY EMPLOYEES)'
                }
            }
        }
    });

}

function computersCountryBar(locations) {
    console.log(locations);
    countries = [];
    count = [];
    for (var i = 0; i < locations.length; i++) {
        countries[i] = locations[i].eCountry;
        count[i] = locations[i].count;
    }
    // Bar chart
    new Chart(document.getElementById("computerspercountry"), {
        type: 'bar',
        data: {
            labels: countries,
            datasets: [
                {
                    label: "# Computers per Country",
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(150, 50, 180, 0.8)',
                        'rgba(5, 20, 100, 0.8)',
                        'rgba(86, 15, 45, 0.8)',
                    ],
                    data: count
                }
            ]
        },
        options: {
            ticks: { stepSize: 1 },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'COMPUTERS PER COUNTRY (ONLY EMPLOYEES)'
                }
            }
        }
    });

}

function usersCountryBar(usersPerCountry) {
    countries = [];
    employeesCount = [];
    contractorsCount = [];

    for (var i = 0; i < usersPerCountry.countries.length; i++) {
        countries[i] = usersPerCountry.countries[i].eCountry;
    }

    for (var i = 0; i < countries.length; i++) {
        for(var j = 0; j < usersPerCountry.employees.length;j++){
            if(countries[i] == usersPerCountry.employees[j].eCountry){
                employeesCount[i] = usersPerCountry.employees[j].count;
            } 
        }
        for(var j = 0; j < usersPerCountry.contractors.length;j++){
            if(countries[i] == usersPerCountry.contractors[j].eCountry){
                contractorsCount[i] = usersPerCountry.contractors[j].count;
            } 
        }
    }

    // Bar chart
    new Chart(document.getElementById("userspercountry"), {
        type: 'bar',
        data: {
            labels: countries,
            datasets: [
                {
                    label: "Employees Users",
                    backgroundColor: "rgba(75, 192, 192, 0.8)",
                    data: employeesCount
                },
                {
                    label: "Contractors Users",
                    backgroundColor: 'rgba(201, 203, 207, 0.8)',
                    data: contractorsCount
                }
            ]
        },
        options: {
            ticks: { stepSize: 1 },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'USERS PER COUNTRY'
                }
            },
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true
                }
            }
        }
    });

}



