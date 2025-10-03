import { Component, OnInit } from '@angular/core';
import { Customer } from '../customer.model';
import { CustomerService } from '../customer.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-customer-list',
  standalone: false,
  templateUrl: './customer-list.component.html',
  styleUrls: ['./customer-list.component.css']
})
export class CustomerListComponent implements OnInit {
  customerList: Customer[] = [];
  imgUrl: string = 'http://localhost:8080/storage/';
  isLoading: boolean = true;
  error: string | null = null;

  constructor(
    private customerService: CustomerService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.customerService.getCustomers()
      .subscribe({
        next: (customers) => {
          this.customerList = customers;
          this.isLoading = false;
        },
        error: (err) => {
          this.error = 'Impossibile caricare i dati. Riprova più tardi.';
          this.isLoading = false;
        }
      });
  }

  showCustomerDetail(customer: Customer): void {
    this.router.navigate(['/customers', customer.id]);
  }
}