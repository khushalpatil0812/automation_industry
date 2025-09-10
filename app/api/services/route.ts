import { type NextRequest, NextResponse } from "next/server"
import { ServicesStorage } from "@/lib/services-storage"

export async function GET() {
  try {
    const services = ServicesStorage.getServices()
    return NextResponse.json(services)
  } catch (error) {
    return NextResponse.json({ error: "Failed to fetch services" }, { status: 500 })
  }
}

export async function POST(request: NextRequest) {
  try {
    const body = await request.json()
    const { title, description, category, categoryValue, image, features } = body

    if (!title || !description || !category || !categoryValue) {
      return NextResponse.json({ error: "Missing required fields" }, { status: 400 })
    }

    const newService = ServicesStorage.addService({
      title,
      description,
      category,
      categoryValue,
      image: image || "/customer-service-interaction.png",
      features: features || [],
    })

    return NextResponse.json(newService, { status: 201 })
  } catch (error) {
    return NextResponse.json({ error: "Failed to create service" }, { status: 500 })
  }
}
