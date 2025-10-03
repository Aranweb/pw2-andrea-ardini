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
  imgUrl: string = 'http://localhost:8080/storage/';

  constructor(
    private route: ActivatedRoute,
    private customerService: CustomerService,
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

  goBackToList(): void {
    this.router.back();
  }
}