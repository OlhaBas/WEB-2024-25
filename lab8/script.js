document.addEventListener('DOMContentLoaded', function () 
{
    const citySelect = document.getElementById('city');
    const deliveryTypeSelect = document.getElementById('deliveryType');
    const branchSelect = document.getElementById('branch');
    const form = document.getElementById('orderForm');

    fetch('api_handler.php?action=getCities')
        .then(response => response.json())
        .then(data => 
            {
            data.forEach(city => 
                {
                const option = document.createElement('option');
                option.value = city.Ref;
                option.textContent = city.Description;
                citySelect.appendChild(option);
            });
        });

    deliveryTypeSelect.addEventListener('change', function () 
    {
        updateBranches();
    });

    citySelect.addEventListener('change', function () 
    {
        updateBranches();
    });

    function updateBranches() 
    {
        const city = citySelect.value;
        const type = deliveryTypeSelect.value;

        if (city && type) 
            {
            fetch(`api_handler.php?action=getBranches&city=${city}&type=${type}`)
                .then(response => response.json())
                .then(data => {
                    branchSelect.innerHTML = '<option value="">Оберіть відділення/поштомат</option>';
                    data.forEach(branch => 
                        {
                        const option = document.createElement('option');
                        option.value = branch.Ref;
                        option.textContent = branch.Description;
                        branchSelect.appendChild(option);
                    });
                });
        }
    }

    form.addEventListener('submit', function (e) 
    {
        e.preventDefault();
        const formData = new FormData(form);

        fetch('api_handler.php?action=saveOrder', 
            {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => 
                {
                document.getElementById('responseMessage').textContent = data.message;
            });
    });
});
