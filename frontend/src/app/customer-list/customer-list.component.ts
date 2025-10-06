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

  newCustomer() {
    this.router.navigate(['/customers/edit']);
  }

  editCustomer(customer: Customer, event: MouseEvent): void {
    // Utilizzo la funzione Javascript stopPropagation per fermare la propagazione per non attivare showCustomerDetail
    event.stopPropagation();
    
    // Navigo alla pagina con il componente customer/edit per la modifica
    this.router.navigate(['/customers/edit', customer.id]);
  }

  // Nuovo metodo per la CANCELLAZIONE
  deleteCustomer(customer: Customer, event: MouseEvent): void {
    // FONDAMENTALE: ferma la propagazione
    event.stopPropagation();

    // Chiedi conferma prima di procedere
    if (confirm(`Sei sicuro di voler eliminare ${customer.name}?`)) {
      console.log('Elimina cliente:', customer);
      // Qui chiamerai il tuo servizio per eliminare il cliente dal database
      // this.customerService.deleteCustomer(customer.id).subscribe(() => {
      //   // Dopo l'eliminazione, aggiorna la lista per riflettere il cambiamento
      //   this.customerList = this.customerList.filter(c => c.id !== customer.id);
      // });
    }
  }
}