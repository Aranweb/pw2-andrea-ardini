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
  customer: Customer = {} as Customer;
  isEditMode: boolean = false;
  selectedFile: File | null = null;
  
  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private customerService: CustomerService
  ) {}

  ngOnInit(): void {
    const customerID = this.route.snapshot.paramMap.get('id');
    if (customerID) {
      this.isEditMode = true;
      this.customerService.getCustomerById(+customerID).subscribe(data=> {
        this.customer = data;
      })
    }
  }

  onFileSelected(event: any): void {
    this.selectedFile = event.target.files[0] ?? null;
  }

  saveCustomer(): void {
    // Utilizzo FormData per inviare sia dati che file
    const formData = new FormData();
    formData.append('name', this.customer.name);
    formData.append('email', this.customer.email);
    formData.append('address', this.customer.address);

    if (this.selectedFile) {
      formData.append('image', this.selectedFile, this.selectedFile.name);
    }

    if (this.isEditMode) {
      this.customerService.updateCustomer(this.customer.id, formData).subscribe(() => {
        this.router.navigate(['']);
      });
    } else {
      this.customerService.createCustomer(formData).subscribe(() => {
        this.router.navigate(['']);
      });
    }
  }
}
