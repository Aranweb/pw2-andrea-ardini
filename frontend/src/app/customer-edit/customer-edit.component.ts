import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Customer } from '../customer.model';
import { CustomerService } from '../customer.service';

@Component({
  selector: 'app-customer-edit',
  standalone: false,
  templateUrl: './customer-edit.component.html',
  styleUrl: './customer-edit.component.css'
})
export class CustomerEditComponent {
  customer: Customer | null = null;
  
  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private customerService: CustomerService
  ) {}

  ngOnInit(): void {
    const customerID = this.route.snapshot.paramMap.get('id');
    if (customerID) {
      this.customerService.getCustomerById(+customerID).subscribe(data=> {
        this.customer = data;
      })
    }
  }
  
  saveCustomer(): void {
    if (this.customer) {
      // 3. Chiama il servizio per inviare i dati aggiornati al backend
      this.customerService.updateCustomer(this.customer).subscribe(() => {
        // 4. A salvataggio completato, torna alla lista clienti
        this.router.navigate(['']);
      });
    }
  }
}
