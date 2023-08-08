<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class StatisticCardComponent extends Component
{
    public $totalOrders;
    public $totalRevenue;
    public $totalCustomer;
    public $selectedFilterOrder;
    public $selectedFilterRevenue;
    public $selectedFilterUser;
     const TODAY = 'Hôm nay';
     const THIS_MONTH = 'Tháng này';
     const THIS_YEAR = 'Năm nay';

    public function mount()
    {
        $this->selectedFilterOrder   = self::THIS_MONTH;
        $this->selectedFilterRevenue = self::THIS_MONTH;
        $this->selectedFilterUser    = self::THIS_MONTH;
        $this->getAllOrders();
        $this->getAllRevenues();
        $this->getAllCustomers();
    }

    public function getAllOrders()
    {
        $this->totalOrders = $this->getOrderCount($this->selectedFilterOrder);
    }

    public function todayOrder()
    {
        $this->selectedFilterOrder = self::TODAY;
        $this->getAllOrders();
    }

    public function monthOrder()
    {
        $this->selectedFilterOrder = self::THIS_MONTH;
        $this->getAllOrders();
    }

    public function yearOrder()
    {
        $this->selectedFilterOrder = self::THIS_YEAR;
        $this->getAllOrders();
    }

    public function getAllRevenues()
    {
        $this->totalRevenue = $this->getTotalRevenue($this->selectedFilterRevenue);
    }

    public function todayRevenue()
    {
        $this->selectedFilterRevenue = self::TODAY;
        $this->getAllRevenues();
    }

    public function monthRevenue()
    {
        $this->selectedFilterRevenue = self::THIS_MONTH;
        $this->getAllRevenues();
    }

    public function yearRevenue()
    {
        $this->selectedFilterRevenue = self::THIS_YEAR;
        $this->getAllRevenues();
    }

    public function getAllCustomers()
    {
        $this->totalCustomer = $this->getCustomerCount($this->selectedFilterUser);
    }

    public function todayCustomer()
    {
        $this->selectedFilterUser = self::TODAY;
        $this->getAllCustomers();
    }

    public function monthCustomer()
    {
        $this->selectedFilterUser = self::THIS_MONTH;
        $this->getAllCustomers();
    }

    public function yearCustomer()
    {
        $this->selectedFilterUser = self::THIS_YEAR;
        $this->getAllCustomers();
    }

    private function getOrderCount($filter)
    {
        return Order::query()
            ->when($filter === self::TODAY, fn ($query) => $query->dayToNow())
            ->when($filter === self::THIS_MONTH, fn ($query) => $query->monthToDate())
            ->when($filter === self::THIS_YEAR, fn ($query) => $query->yearToDate())
            ->where('status', '!=', Order::CANCELLED)
            ->where('status', Order::COMPLETED)
            ->count();
    }

    private function getTotalRevenue($filter)
    {
        return Order::query()
            ->when($filter === self::TODAY, fn ($query) => $query->dayToNow())
            ->when($filter === self::THIS_MONTH, fn ($query) => $query->monthToDate())
            ->when($filter === self::THIS_YEAR, fn ($query) => $query->yearToDate())
            ->where('status', '!=', Order::CANCELLED)
            ->where('status', Order::COMPLETED)
            ->sum('total_price');
    }

    private function getCustomerCount($filter)
    {
        return User::query()
            ->when($filter === self::TODAY, fn ($query) => $query->dayToNow())
            ->when($filter === self::THIS_MONTH, fn ($query) => $query->monthToDate())
            ->when($filter === self::THIS_YEAR, fn ($query) => $query->yearToDate())
            ->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.statistic-card-component', [
            'totalOrders' => $this->totalOrders,
            'totalRevenue' => $this->totalRevenue,
            'totalCustomer' => $this->totalCustomer,
        ]);
    }
}
