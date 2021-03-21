<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Director']);
        $role2 = Role::create(['name' => 'Administradores']);

        Permission::create(['name'=>'user.index'])->assignRole($role1);
        Permission::create(['name'=>'user.create'])->assignRole($role1);
        Permission::create(['name'=>'user.store'])->assignRole($role1);
        Permission::create(['name'=>'user.destroy'])->assignRole($role1);
        
        Permission::create(['name'=>'coilReel.create'])->assignRole($role1);
        Permission::create(['name'=>'coilReel.store'])->assignRole($role1);
        Permission::create(['name'=>'coilReel.update'])->assignRole($role1);
        Permission::create(['name'=>'coilReel.edit'])->assignRole($role1);
        Permission::create(['name'=>'coilReel.index'])->assignRole($role1);
        Permission::create(['name'=>'coilReel.destroy'])->assignRole($role1);
        Permission::create(['name'=>'coilReel.createProduct'])->assignRole($role1);
        Permission::create(['name'=>'coilReel.show'])->assignRole($role1);

        Permission::create(['name'=>'coil.create'])->assignRole($role1);
        Permission::create(['name'=>'coil.store'])->assignRole($role1);
        Permission::create(['name'=>'coil.update'])->assignRole($role1);
        Permission::create(['name'=>'coil.edit'])->assignRole($role1);
        Permission::create(['name'=>'coil.index'])->assignRole($role1);
        Permission::create(['name'=>'coil.destroy'])->assignRole($role1);
        Permission::create(['name'=>'coil.show'])->assignRole($role1);
        Permission::create(['name'=>'coil.terminar'])->assignRole($role1);

        Permission::create(['name'=>'ribbon.create'])->assignRole($role1);
        Permission::create(['name'=>'ribbon.store'])->assignRole($role1);
        Permission::create(['name'=>'ribbon.update'])->assignRole($role1);
        Permission::create(['name'=>'ribbon.edit'])->assignRole($role1);
        Permission::create(['name'=>'ribbon.index'])->assignRole($role1);
        Permission::create(['name'=>'ribbon.destroy'])->assignRole($role1);
        Permission::create(['name'=>'ribbon.createProduct'])->assignRole($role1);
        Permission::create(['name'=>'ribbon.show'])->assignRole($role1);

        Permission::create(['name'=>'whiteCoil.create'])->assignRole($role1);
        Permission::create(['name'=>'whiteCoil.store'])->assignRole($role1);
        Permission::create(['name'=>'whiteCoil.update'])->assignRole($role1);
        Permission::create(['name'=>'whiteCoil.edit'])->assignRole($role1);
        Permission::create(['name'=>'whiteCoil.index'])->assignRole($role1);
        Permission::create(['name'=>'whiteCoil.destroy'])->assignRole($role1);
        Permission::create(['name'=>'whiteCoil.show'])->assignRole($role1);
        
        Permission::create(['name'=>'coilProduct.create'])->assignRole($role1);
        Permission::create(['name'=>'coilProduct.store'])->assignRole($role1);
        Permission::create(['name'=>'coilProduct.update'])->assignRole($role1);
        Permission::create(['name'=>'coilProduct.edit'])->assignRole($role1);
        Permission::create(['name'=>'coilProduct.index'])->assignRole($role1);
        Permission::create(['name'=>'coilProduct.destroy'])->assignRole($role1);
        Permission::create(['name'=>'coilProduct.show'])->assignRole($role1);

        Permission::create(['name'=>'whiteCoilProduct.create'])->assignRole($role1);
        Permission::create(['name'=>'whiteCoilProduct.store'])->assignRole($role1);
        Permission::create(['name'=>'whiteCoilProduct.update'])->assignRole($role1);
        Permission::create(['name'=>'whiteCoilProduct.edit'])->assignRole($role1);
        Permission::create(['name'=>'whiteCoilProduct.index'])->assignRole($role1);
        Permission::create(['name'=>'whiteCoilProduct.destroy'])->assignRole($role1);
        Permission::create(['name'=>'whiteCoilProduct.show'])->assignRole($role1);

        Permission::create(['name'=>'whiteRibbon.create'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbon.store'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbon.update'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbon.edit'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbon.index'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbon.destroy'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbon.createProduct'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbon.show'])->assignRole($role1);

        Permission::create(['name'=>'wasteRibbon.create'])->assignRole($role1);
        Permission::create(['name'=>'wasteRibbon.store'])->assignRole($role1);
        Permission::create(['name'=>'wasteRibbon.update'])->assignRole($role1);
        Permission::create(['name'=>'wasteRibbon.edit'])->assignRole($role1);
        Permission::create(['name'=>'wasteRibbon.index'])->assignRole($role1);
        Permission::create(['name'=>'wasteRibbon.destroy'])->assignRole($role1);
        Permission::create(['name'=>'wasteRibbon.createProduct'])->assignRole($role1);
        Permission::create(['name'=>'wasteRibbon.show'])->assignRole($role1);

        Permission::create(['name'=>'provider.create'])->assignRole($role1);
        Permission::create(['name'=>'provider.store'])->assignRole($role1);
        Permission::create(['name'=>'provider.update'])->assignRole($role1);
        Permission::create(['name'=>'provider.edit'])->assignRole($role1);
        Permission::create(['name'=>'provider.index'])->assignRole($role1);
        Permission::create(['name'=>'provider.destroy'])->assignRole($role1);
        Permission::create(['name'=>'provider.show'])->assignRole($role1);

        Permission::create(['name'=>'bag.create'])->assignRole($role1);
        Permission::create(['name'=>'bag.store'])->assignRole($role1);
        Permission::create(['name'=>'bag.update'])->assignRole($role1);
        Permission::create(['name'=>'bag.edit'])->assignRole($role1);
        Permission::create(['name'=>'bag.index'])->assignRole($role1);
        Permission::create(['name'=>'bag.destroy'])->assignRole($role1);
        Permission::create(['name'=>'bag.createProduct'])->assignRole($role1);
        Permission::create(['name'=>'bag.show'])->assignRole($role1);

        Permission::create(['name'=>'wasteBag.create'])->assignRole($role1);
        Permission::create(['name'=>'wasteBag.store'])->assignRole($role1);
        Permission::create(['name'=>'wasteBag.update'])->assignRole($role1);
        Permission::create(['name'=>'wasteBag.edit'])->assignRole($role1);
        Permission::create(['name'=>'wasteBag.index'])->assignRole($role1);
        Permission::create(['name'=>'wasteBag.destroy'])->assignRole($role1);
        Permission::create(['name'=>'wasteBag.createProduct'])->assignRole($role1);
        Permission::create(['name'=>'wasteBag.show'])->assignRole($role1);

        Permission::create(['name'=>'ribbonProduct.create'])->assignRole($role1);
        Permission::create(['name'=>'ribbonProduct.store'])->assignRole($role1);
        Permission::create(['name'=>'ribbonProduct.update'])->assignRole($role1);
        Permission::create(['name'=>'ribbonProduct.edit'])->assignRole($role1);
        Permission::create(['name'=>'ribbonProduct.index'])->assignRole($role1);
        Permission::create(['name'=>'ribbonProduct.destroy'])->assignRole($role1);
        Permission::create(['name'=>'ribbonProduct.createProduct'])->assignRole($role1);
        Permission::create(['name'=>'ribbonProduct.show'])->assignRole($role1);

        Permission::create(['name'=>'whiteRibbonProduct.create'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbonProduct.store'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbonProduct.update'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbonProduct.edit'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbonProduct.index'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbonProduct.destroy'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbonProduct.show'])->assignRole($role1);

        Permission::create(['name'=>'employee.create'])->assignRole($role1);
        Permission::create(['name'=>'employee.store'])->assignRole($role1);
        Permission::create(['name'=>'employee.update'])->assignRole($role1);
        Permission::create(['name'=>'employee.edit'])->assignRole($role1);
        Permission::create(['name'=>'employee.index'])->assignRole($role1);
        Permission::create(['name'=>'employee.destroy'])->assignRole($role1);
        Permission::create(['name'=>'employee.show'])->assignRole($role1);

        Permission::create(['name'=>'whiteWaste.create'])->assignRole($role1);
        Permission::create(['name'=>'whiteWaste.store'])->assignRole($role1);
        Permission::create(['name'=>'whiteWaste.update'])->assignRole($role1);
        Permission::create(['name'=>'whiteWaste.edit'])->assignRole($role1);
        Permission::create(['name'=>'whiteWaste.index'])->assignRole($role1);
        Permission::create(['name'=>'whiteWaste.destroy'])->assignRole($role1);
        Permission::create(['name'=>'whiteWaste.createProduct'])->assignRole($role1);
        Permission::create(['name'=>'whiteWaste.show'])->assignRole($role1);

        Permission::create(['name'=>'ribbonReel.create'])->assignRole($role1);
        Permission::create(['name'=>'ribbonReel.store'])->assignRole($role1);
        Permission::create(['name'=>'ribbonReel.update'])->assignRole($role1);
        Permission::create(['name'=>'ribbonReel.edit'])->assignRole($role1);
        Permission::create(['name'=>'ribbonReel.index'])->assignRole($role1);
        Permission::create(['name'=>'ribbonReel.destroy'])->assignRole($role1);
        Permission::create(['name'=>'ribbonReel.createProduct'])->assignRole($role1);
        Permission::create(['name'=>'ribbonReel.show'])->assignRole($role1);

        Permission::create(['name'=>'whiteRibbonReel.create'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbonReel.store'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbonReel.update'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbonReel.edit'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbonReel.index'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbonReel.destroy'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbonReel.createProduct'])->assignRole($role1);
        Permission::create(['name'=>'whiteRibbonReel.show'])->assignRole($role1);

        Permission::create(['name'=>'whiteWasteRibbon.create'])->assignRole($role1);
        Permission::create(['name'=>'whiteWasteRibbon.store'])->assignRole($role1);
        Permission::create(['name'=>'whiteWasteRibbon.update'])->assignRole($role1);
        Permission::create(['name'=>'whiteWasteRibbon.edit'])->assignRole($role1);
        Permission::create(['name'=>'whiteWasteRibbon.index'])->assignRole($role1);
        Permission::create(['name'=>'whiteWasteRibbon.destroy'])->assignRole($role1);
        Permission::create(['name'=>'whiteWasteRibbon.createProduct'])->assignRole($role1);
        Permission::create(['name'=>'whiteWasteRibbon.show'])->assignRole($role1);

        Permission::create(['name'=>'coilType.create'])->assignRole($role1);
        Permission::create(['name'=>'coilType.store'])->assignRole($role1);
        Permission::create(['name'=>'coilType.update'])->assignRole($role1);
        Permission::create(['name'=>'coilType.edit'])->assignRole($role1);
        Permission::create(['name'=>'coilType.index'])->assignRole($role1);
        Permission::create(['name'=>'coilType.destroy'])->assignRole($role1);
        Permission::create(['name'=>'coilType.show'])->assignRole($role1);
    }
}
