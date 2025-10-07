import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Location } from '@angular/common';
import { CustomerService } from '../customer.service';
import { Customer } from '../customer.model';

@Component({
  selector: 'app-customer-detail',
  standalone: false,
  templateUrl: './customer-detail.component.html',
  styleUrls: ['./customer-detail.component.css']
})
export class CustomerDetailComponent implements OnInit {
  customer: Customer | null = null;

  constructor(
    private route: ActivatedRoute,
    public customerService: CustomerService, // public per la gestione dello storageUrl
    private router: Location
  ) {}

  ngOnInit(): void {
    const customerId = this.route.snapshot.paramMap.get('id');

    if (customerId) {
      this.customerService.getCustomerById(+customerId).subscribe(data => {
        this.customer = data;
        console.log('Dati cliente ricevuti:', this.customer);
      });
    }
  }
}